<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->response->redirect('/api_doc/index.html');
        $this->response->send();
    }
}

