<?php
use Phalcon\Mvc\View;

class AcheteurController extends ControllerBase
{
    public function initialize(){
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
        $this->view->disableLevel(View::LEVEL_LAYOUT);

    }
    public function listeAction(){

    }
}