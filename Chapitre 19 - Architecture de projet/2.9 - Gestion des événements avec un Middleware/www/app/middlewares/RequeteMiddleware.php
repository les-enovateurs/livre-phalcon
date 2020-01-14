<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class RequeteMiddleware implements MiddlewareInterface
{
    public function beforeExecuteRoute(Event $oEvent, Micro $app)
    {
        $sURL           = $app->getRouter()->getMatchedRoute()->getPattern();
        $nHeureCourante = date('H');
        //pour tester
        //$nHeureCourante = 7;

        if ($nHeureCourante < 9 && false === in_array($sURL, ['/', '/soldes_ferme'])) {

            $app->response->redirect('/soldes_ferme');
            $app->response->sendHeaders();

            return false;
        }

        return true;
    }


    public function call(Micro $application)
    {
        return true;
    }
}