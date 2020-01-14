<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {      
        $this->logger->log(
            Phalcon\Logger::DEBUG,
            'un message avec la fonction log'
        );

        $this->logger->debug(
            'un message de type debug'
        );
        
        $this->logger->info(
            'un message de type info'
        );
        
        $this->logger->notice(
            'un message de type notice'
        );
        
        $this->logger->warning(
            'un message de type warning'
        );
        
        $this->logger->error(
            'un message de type error'
        );
        
        $this->logger->alert(
            'un message de type alert'
        );
        
        $this->logger->critical(
            'un message de type critical'
        );
        
        $this->logger->emergency(
            'un message de type emergency'
        );   
    }
}

