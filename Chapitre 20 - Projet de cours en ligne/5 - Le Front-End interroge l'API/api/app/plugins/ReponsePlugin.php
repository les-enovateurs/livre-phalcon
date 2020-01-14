<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class ReponsePlugin extends Plugin
{
    public function afterExecuteRoute(Event $event, Dispatcher $oDispatcher)
    {
        $this->response->setJsonContent(
            [
                'code'    => 200,
                'status'  => 'success',
                'message' => '',
                'payload' => $oDispatcher->getReturnedValue()
            ]
        );

        return $this->response->send();
    }

}
