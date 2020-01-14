<?php

use HelloWorld\Forms\Chap6Form;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $oForm = new Chap6Form();

        $this->view->form = $oForm;
    }

}

