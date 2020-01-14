<?php

use HelloWorld\Forms\Chap6Form;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $oForm = new Chap6Form();

        if (true === $this->request->isPost() && false === $oForm->isValid(array_merge($this->request->getPost(),$_FILES))) {
            $aMessages = $oForm->getMessages();
            $sErreurs = '';

            foreach($aMessages as $sMessage){
                $sErreurs .= '- '. $sMessage . '<br />';
            }

            $this->view->erreurs = $sErreurs;
        }

        $this->view->form = $oForm;
    }

}