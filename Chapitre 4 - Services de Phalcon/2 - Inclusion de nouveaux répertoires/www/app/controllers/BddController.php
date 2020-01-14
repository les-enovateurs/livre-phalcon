<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction(){
        $this->view->utilisateurs = Utilisateurs::find();
    }
}

