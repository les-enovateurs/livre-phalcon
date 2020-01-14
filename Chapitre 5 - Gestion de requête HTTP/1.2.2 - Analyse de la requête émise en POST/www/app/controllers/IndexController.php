<?php

use Phalcon\Filter;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function inscriptionAction()
    {
        $this->view->avec_post    = $this->request->isPost();
        $this->view->avec_ajax    = $this->request->isAjax();
    }
}

