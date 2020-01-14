<?php

use HelloWorld\Forms\Chap6Form;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $oForm = new Chap6Form();

        if (true === $this->request->isPost()){

            $aDonneesEnvoyees = array_merge($this->request->getPost(),$_FILES);

            if(false === $oForm->isValid($aDonneesEnvoyees)){
                // Formulaire invalide
            }
            else{
                // Formulaire valide
            }
        }

        $this->view->form = $oForm;
    }

}

