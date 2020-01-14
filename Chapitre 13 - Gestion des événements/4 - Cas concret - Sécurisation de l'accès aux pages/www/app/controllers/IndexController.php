<?php

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

    public function tableauDeBordAction(){

    }

    public function deconnexionAction()
    {
        $this->session->destroy();
        $this->view->utilisateur_connecte = null;
    }
}

