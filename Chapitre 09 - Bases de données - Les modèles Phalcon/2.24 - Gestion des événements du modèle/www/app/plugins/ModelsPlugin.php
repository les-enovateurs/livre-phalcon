<?php

namespace HelloWorld\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class ModelsPlugin extends Plugin
{
    public function prepareSave(Event $oEvent, $oModel)
    {
        $this->logger->debug('Préparation à la sauvegarde');
    }

    public function beforeValidation(Event $oEvent, $oModel)
    {
        $this->logger->debug('Avant validation');
    }

    public function beforeValidationOnCreate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Avant validation de création de ligne');
    }

    public function beforeValidationOnUpdate(Event $oEvent, $oModel)
    {
        $this->logger->debug("Avant validation d'une modification de ligne");
    }

    public function validation(Event $oEvent, $oModel)
    {
        $this->logger->debug('Validation');
    }

    public function onValidationFails(Event $oEvent, $oModel)
    {
        $this->logger->debug('Validation a échoué');
    }

    public function afterValidationOnCreate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après validation de création de ligne');
    }

    public function afterValidationOnUpdate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après validation de mise à jour de donnnées');
    }

    public function afterValidation(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après validation');
    }

    public function beforeCreate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Avant création');
    }

    public function beforeUpdate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Avant mise à jour');
    }

    public function beforeSave(Event $oEvent, $oModel)
    {
        $this->logger->debug('Avant sauvegarde');
    }

    public function beforeDelete(Event $oEvent, $oModel)
    {
        $this->logger->debug('Avant suppression');
    }

    public function afterCreate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après création');
    }

    public function afterUpdate(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après modification');
    }

    public function afterSave(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après ajout/modification');
    }

    public function afterDelete(Event $oEvent, $oModel)
    {
        $this->logger->debug('Après suppression');
    }
}
