<?php

use Phalcon\Filter;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function inscriptionAction()
    {
        if(true === $this->request->isPost()){
            $sEmail      = $this->request->getPost('email');
            $sMotDePasse = $this->request->getPost('mot_de_passe');
    
            $this->view->email        = $sEmail;
            $this->view->mot_de_passe = $sMotDePasse;
            $this->view->avec_post    = $this->request->isPost(); 
            $this->view->avec_ajax    = $this->request->isAjax();           
        }
    }
}

