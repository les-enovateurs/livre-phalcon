<?php

use Phalcon\Mvc\View;

class UtilisateurController extends ControllerBase
{
    public function suppressionPersonneAction(){
        $this->view->setRenderLevel(
            View::LEVEL_ACTION_VIEW
        );
    }

    public function sansvueAction(){
        return json_encode(
            ['prenom' => 'Jeremy']
        );
    }
}