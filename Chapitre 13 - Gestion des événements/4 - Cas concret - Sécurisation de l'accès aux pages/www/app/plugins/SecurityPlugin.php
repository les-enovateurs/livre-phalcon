<?php

namespace HelloWorld\Plugins;

use Phalcon\Di\Injectable;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Event;

use HelloWorld\Models\Utilisateurs;

class SecurityPlugin extends Injectable
{
    public function beforeExecuteRoute(Event $oEvent, Dispatcher $oDispatcher)
    {
        $oUtilisateur = null;
        if (true === $this->session->has('utilisateur')) {
            $oUtilisateur = $this->session->get('utilisateur');
        }

        $sControleur = $oDispatcher->getControllerName();
        $sAction     = $oDispatcher->getActionName();

        if (true === is_null($oUtilisateur)) {
            if ( $sControleur === 'index' && ( $sAction === 'connexion' || $sAction === 'index') ){
                return true;
            }else {
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

        if($oUtilisateur instanceof Utilisateurs){
            $this->view->utilisateur_connecte = $oUtilisateur;
        }
        else{
            $oDispatcher->forward(
                [
                    'controller' => 'erreurs',
                    'action'     => 'code401',
                ]
            );

            return false;
        }

        return true;
    }
}
