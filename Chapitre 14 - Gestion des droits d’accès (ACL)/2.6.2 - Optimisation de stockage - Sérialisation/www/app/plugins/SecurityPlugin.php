<?php

namespace HelloWorld\Plugins;

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory;

class SecurityPlugin extends Plugin
{

    public function getAcl()
    {
        $oAcl = null;

        if (true === is_file(APP_PATH . '/security/acl.data')) {
            $oAcl = unserialize(file_get_contents(APP_PATH . '/security/acl.data'));
        } else {

            $oAcl = new Memory();

            $oAcl->setDefaultAction(Acl::DENY);

            /** Liste de rôle */
            $aRoles = [
                'vendeurs' => new Role(
                    'vendeurs',
                    'Accès uniquement à la partie vente de produit.'
                ),
                'clients'  => new Role(
                    'clients',
                    'Accès uniquement à la partie achat de produit.'
                )
            ];

            foreach ($aRoles as $oRole) {
                $oAcl->addRole($oRole);
            }

            $aActionParRole = [
                'vendeurs' => [
                    'vendeurs' => [ 'profil' ],
                    'produits' => [ 'nouveau', 'edition' ]
                ],
                'clients'  => [
                    'clients'  => [ 'profil' ],
                    'produits' => [ 'acheter' ]
                ],
                '*' => [
                    'index'   => [ 'index', 'connexion', 'deconnexion' ],
                    'erreurs' => [ '*' ]
                ]
            ];

            foreach ($aActionParRole as $sRole => $aRole) {
                foreach ($aRole as $sControleur => $aActions) {
                    $oRessourceControleur = new Resource($sControleur);
                    foreach($aActions as $sAction){
                        $oAcl->addResource($oRessourceControleur, $sAction);
                        $oAcl->allow($sRole, $sControleur, $sAction);
                    }
                }
            }

            file_put_contents(APP_PATH . '/security/acl.data',serialize($oAcl));
        }

        $oGestionEvenement = new \Phalcon\Events\Manager();

        $oGestionEvenement->attach(
            'acl:beforeCheckAccess',
            function (Event $oEvent, $oAcl) {
                $this->logger->debug("Avant accès");
                $this->logger->debug('Rôle actif : ' . $oAcl->getActiveRole());
                $this->logger->debug('Contrôleur : ' . $oAcl->getActiveResource());
                $this->logger->debug('Action : '.$oAcl->getActiveAccess());

                return true;
            }
        );

        $oGestionEvenement->attach(
            'acl:afterCheckAccess',
            function (Event $oEvent, $oAcl) {
                $this->logger->debug("Après accès");
                $this->logger->debug('Rôle actif : ' . $oAcl->getActiveRole());
                $this->logger->debug('Contrôleur : ' . $oAcl->getActiveResource());
                $this->logger->debug('Action : '.$oAcl->getActiveAccess());
            }
        );

        $oAcl->setEventsManager($oGestionEvenement);

        return $oAcl;
    }

    public function beforeExecuteRoute(Event $oEvent, Dispatcher $oDispatcher)
    {
        $oUtilisateur = null;
        if (true === $this->session->has('utilisateur')) {
            $oUtilisateur = $this->session->get('utilisateur');
        }

        $sControleur = $oDispatcher->getControllerName();
        $sAction     = $oDispatcher->getActionName();

        if (true === is_null($oUtilisateur)) {
            if ( $sControleur === 'index' && ( $sAction === 'connexion' ||
                                                    $sAction === 'index' ||
                                                    $sAction === 'fonctionVerificationAvance' ||
                                                    $sAction === 'heritageRole') ){
                return true;
            }
            else {
                $oDispatcher->forward(
                    [
                        'controller' => 'index',
                        'action'     => 'connexion',
                        'params'     =>
                            [
                                'erreurs' => 'Pour accéder à la page '.$sControleur.'/'.$sAction.' vous devez être connecté.'
                            ]
                    ]
                );
                return false;
            }
        }

        $sNomRole = $oUtilisateur->nom_role;

        $oAcl = $this->getAcl();
        $bAutorise = $oAcl->isAllowed($sNomRole, $sControleur, $sAction);
        if (false === $bAutorise) {
            $oDispatcher->forward(
                [
                    'controller' => 'erreurs',
                    'action'     => 'code401',
                ]
            );

            return false;
        }

        $this->view->utilisateur_connecte = $oUtilisateur;
    }
}
