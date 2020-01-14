<?php

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class ReponseMiddleware implements MiddlewareInterface
{
    public function call(Micro $app)
    {
        $app->response->setJsonContent(
            [
                'code'    => 200,
                'status'  => 'success',
                'message' => '',
                'payload' => $app->getReturnedValue()
            ]
        );

        return $app->response->send();
    }
}