<?php

namespace HelloWorld\Plugins;

use Phalcon\Events\Event;
use Phalcon\Di\Injectable;

class ViewPlugin extends Injectable
{
    public function beforeRender(Event $oEvent, $oView)
    {
        $this->logger->debug('Evenement beforeRender - Action demandée '.$oView->getActionName());
    }
}
