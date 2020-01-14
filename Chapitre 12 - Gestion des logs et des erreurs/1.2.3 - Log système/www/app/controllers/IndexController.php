<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->logger->error(
            'une première erreur'
        );

        $this->logger->debug(
            'un log de debug'
        );
    }
}

