<?php

class IndexController extends ControllerBase
{

    public function rechercheAction()
    {
        $sParam1 = $this->dispatcher->getParam('param1');  
        $sParam2 = $this->dispatcher->getParam('param2');

        $this->view->param1 = $sParam1;
        $this->view->param2 = $sParam2;
    }

    public function indexAction(){

    }

}

