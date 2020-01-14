<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function onConstruct(){       
        $this->assets->addCss('css/tous_controleur.css');
        $this->assets->addJs('js/tous_controleur.js');
    }
}
