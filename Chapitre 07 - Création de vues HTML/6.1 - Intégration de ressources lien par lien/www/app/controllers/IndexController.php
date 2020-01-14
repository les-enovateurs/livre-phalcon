<?php

use Phalcon\Mvc\View;

class IndexController extends ControllerBase
{
    public function initialize(){
        $this->assets->addCss('css/index_controleur.css');
        
        $this->assets->addJs('js/index_controleur.js');
    }

    public function indexAction()
    {
        // Ajout de ressource CSS
        $this->assets->addCss('css/soldes.css');
        $this->assets->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false);

        // Ajout de ressource JS
        $this->assets->addJs('js/soldes.js');
        $this->assets->addJs('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', false);
    }
}

