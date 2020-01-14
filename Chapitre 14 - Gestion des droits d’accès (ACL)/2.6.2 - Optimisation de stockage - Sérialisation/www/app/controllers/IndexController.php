<?php

use Phalcon\Acl;

use HelloWorld\Models\Utilisateurs;

class IndexController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionAction()
    {

        $sErreur = $this->dispatcher->getParam('erreurs');

        if (true === $this->request->isPost()) {
            $sEmail = $this->request->getPost('email');

            $oUtilisateur = Utilisateurs::findFirstByEmail($sEmail);
            if ($oUtilisateur instanceof Utilisateurs) {
                $this->session->set('utilisateur', $oUtilisateur);
                $this->dispatcher->forward(
                    [
                        'controller' => 'index',
                        'action'     => 'index',
                    ]
                );

                return false;
            } else {
                $sErreur .= 'Aucun utilisateur trouvé. Veuillez réessayer.';
            }
        }

        $this->view->erreurs = $sErreur;

        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function deconnexionAction()
    {
        $this->session->destroy();
        $this->view->utilisateur_connecte = null;
    }

    public function fonctionVerificationAvanceAction()
    {
        $oAclExemple = new Phalcon\Acl\Adapter\Memory();
        $oAclExemple->setDefaultAction(Acl::DENY);
        $oAclExemple->addRole(new Phalcon\Acl\Role('membre'));
        $oAclExemple->addResource(new Phalcon\Acl\Resource('groupe'), 'ajouter');
        $oAclExemple->allow(
            'membre',
            'groupe',
            'ajouter',
            function ($sTypeCompte, $sActif) {
                if ('Premium' === $sTypeCompte && true === $sActif) {
                    return true;
                }

                return false;
            }
        );

        $this->view->acces = $oAclExemple->isAllowed(
            'membre',
            'groupe',
            'ajouter',
            [
                'sTypeCompte' => 'Premium',
                'sActif'      => true
            ]
        );

        $this->view->acces2 = $oAclExemple->isAllowed(
            'membre',
            'groupe',
            'ajouter',
            [
                'sTypeCompte' => 'Classique',
                'sActif'      => true
            ]
        );
    }

    public function heritageRoleAction()
    {
        $oAclExemple = new Phalcon\Acl\Adapter\Memory();
        $oAclExemple->setDefaultAction(Acl::DENY);

        $oRoleMembre = new Phalcon\Acl\Role('membre');

        $oAclExemple->addRole(new Phalcon\Acl\Role('invite'));

        //Le membre rôle hérite du rôle invité
        $oAclExemple->addRole($oRoleMembre, 'invite');

        $oAclExemple->addResource(new Phalcon\Acl\Resource('groupe'), 'liste');
        $oAclExemple->addResource(new Phalcon\Acl\Resource('groupe'), 'ajouter');
        $oAclExemple->allow(
            'invite',
            'groupe',
            'liste'
        );

        $oAclExemple->allow(
            'membre',
            'groupe',
            'ajouter'
        );

        $this->view->membre_liste_groupe = $oAclExemple->isAllowed(
            'membre',
            'groupe',
            'liste'
        );

        $this->view->invite_liste_groupe = $oAclExemple->isAllowed(
            'invite',
            'groupe',
            'liste'
        );

        $this->view->membre_ajouter_groupe = $oAclExemple->isAllowed(
            'membre',
            'groupe',
            'ajouter'
        );

        $this->view->invite_ajouter_groupe = $oAclExemple->isAllowed(
            'invite',
            'groupe',
            'ajouter'
        );

        /** AUTRE MANIERE */
        $oAclExemple->addRole(new Phalcon\Acl\Role('administrateur'));
        $oAclExemple->addRole(new Phalcon\Acl\Role('stagiaire'));

        $oAclExemple->addInherit('administrateur', 'stagiaire');

        $oAclExemple->addResource(new Phalcon\Acl\Resource('dossier'), 'liste');
        $oAclExemple->addResource(new Phalcon\Acl\Resource('dossier'), 'ajouter');

        $oAclExemple->allow(
            'stagiaire',
            'dossier',
            'liste'
        );

        $oAclExemple->allow(
            'administrateur',
            'dossier',
            'ajouter'
        );

        $this->view->administrateur_liste_dossier = $oAclExemple->isAllowed(
            'administrateur',
            'dossier',
            'liste'
        );

        $this->view->stagiaire_liste_dossier = $oAclExemple->isAllowed(
            'stagiaire',
            'dossier',
            'liste'
        );

        $this->view->administrateur_ajouter_dossier = $oAclExemple->isAllowed(
            'administrateur',
            'dossier',
            'ajouter'
        );

        $this->view->stagiaire_ajouter_dossier = $oAclExemple->isAllowed(
            'stagiaire',
            'dossier',
            'ajouter'
        );
    }
}

