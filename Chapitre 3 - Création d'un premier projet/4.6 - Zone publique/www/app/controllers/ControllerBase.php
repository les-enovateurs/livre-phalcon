<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function onConstruct()
    {
        $headerCollection = $this->assets->collection('general');

        $headerCollection->addJs('js/jquery.js');
        $headerCollection->addJs('js/bootstrap.min.js');

        $this->assets->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false);

        
    }
}
