<?php

namespace HelloWorld\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class ViewPlugin extends Plugin
{
    public function beforeRender(Event $oEvent, $oView)
    {
        $this->logger->debug('Evenement beforeRender - Action demandée '.$oView->getActionName());
    }
}
