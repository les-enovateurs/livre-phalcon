<?php

use NovaMooc\Forms\ConnexionForm;

class IndexController extends ControllerBase
{

    public function santeAction()
    {
        $oContenu = $this->api->get('sante');

        $this->view->etat = $oContenu->etat;
    }

    public function indexAction()
    {
        $oConnexionForm = null;
        if (true === $this->request->isPost()) {
            $oConnexionForm = new ConnexionForm();
            if (true === $oConnexionForm->isValid($this->request->getPost())) {
                $oContenu = $this->api->post('connexion', [
                    'email'        => $this->request->getPost('email'),
                    'mot_de_passe' => $this->request->getPost('mot_de_passe')
                ]);

                if(false == $oContenu){
                    $this->view->erreurs = 'Compte inexistant';
                }
                else{
                    $this->session->set('utilisateur',$oContenu->utilisateur);

                    $this->response->redirect('enseignant');
                    return $this->response->send();
                }
            }else {
                $aMessages = $oConnexionForm->getMessages();
                $sErreurs  = '';

                foreach ($aMessages as $sMessage) {
                    $sErreurs .= '- ' . $sMessage . '<br />';
                }

                $this->view->erreurs = $sErreurs;
            }
        }
        else {
            $oConnexionForm = new ConnexionForm(null);
        }

        $this->view->connexion_form = $oConnexionForm;
    }
}

