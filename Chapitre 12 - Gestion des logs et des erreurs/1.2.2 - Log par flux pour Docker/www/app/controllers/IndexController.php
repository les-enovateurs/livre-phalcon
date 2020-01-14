<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->logger->error(
            'une première erreur'
        );
    }
}

