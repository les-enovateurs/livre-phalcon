<?php

namespace HelloWorld\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class BDDPlugin extends Plugin
{

    public function afterConnect(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            'Après connexion'
        );
    }

    public function beforeQuery(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            'Avant une requête SQL'
        );

       if(false !== strpos(strtoupper($oConnexion->getSQLStatement()),'INSERT')){
           
        $this->logger->warning(
                'Requête refusé : '.$oConnexion->getSQLStatement()
            );

           return false;
       }

       $this->logger->debug(
            'Requête accepté : '.$oConnexion->getSQLStatement()
        );

       return true;
    }

    public function afterQuery(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            "Après l'execution d'une requête"
        ); 
    }

    public function beforeDisconnect(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            "Avant la déconnexion"
        ); 
    }

    public function beginTransaction(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            "Avant une transaction"
        ); 
    }

    public function rollbackTransaction(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            "Retour en arrière"
        ); 
    }

    public function commitTransaction(Event $oEvent, $oConnexion)
    {
        $this->logger->debug(
            "Validation d'une transaction"
        ); 
    }
}
