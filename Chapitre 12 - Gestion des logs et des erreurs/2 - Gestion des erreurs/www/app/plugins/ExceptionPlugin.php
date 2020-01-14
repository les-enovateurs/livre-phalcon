<?php

namespace HelloWorld\Plugins;

use Phalcon\Events\Event;
use Phalcon\Di\Injectable;
use Phalcon\Dispatcher\Exception as DispatcherExceptionCode;
use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

/**
 * Gestion des exceptions
 */
class ExceptionPlugin extends Injectable
{
    /**
     * L'événement utilisé avant le déclenchement d'une exception
     *
     * @param Event $oEvent
     * @param MvcDispatcher $oDispatcher
     * @param \Exception $oException
     * @return boolean
     */
    public function beforeException(Event $oEvent, MvcDispatcher $oDispatcher, \Exception $oException)
    {
        $this->logger->error($oException->getMessage() . PHP_EOL . $oException->getTraceAsString());

        if ($oException instanceof DispatcherException) {
            switch ($oException->getCode()) {
                case DispatcherExceptionCode::EXCEPTION_HANDLER_NOT_FOUND:
                case DispatcherExceptionCode::EXCEPTION_ACTION_NOT_FOUND:
                    $oDispatcher->forward(
                        [
                            'controller' => 'error',
                            'action'     => 'code404',
                        ]
                    );
                    return false;
            }
        }

        $oDispatcher->forward(
            [
                'controller' => 'error',
                'action'     => 'code500',
            ]
        );

        return false;
    }
}
