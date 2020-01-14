<?php

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{
    public function indexAction()
    {}

    public function erreurImportanteAction(){
        throw new \Exception("une erreur 500");
    }
}

