<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->setVars([
            't' => $this->traduction
        ]);
    }
}
