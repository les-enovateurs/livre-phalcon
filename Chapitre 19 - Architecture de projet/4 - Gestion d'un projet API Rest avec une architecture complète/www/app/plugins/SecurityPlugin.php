<?php

use Phalcon\Events\Event;
use Phalcon\Di\Injectable;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Injectable
{
    //Avant de gérer une requête extérieur
    public function beforeHandleRoute(Event $oEvent, Dispatcher $oDispatcher)
    {
        //Vérification de l'adresse IP entrante
        $aListeBlancheIp = [
            '127.0.0.1',
            '192.168.99.100',
            '192.168.48.1',
            '::1'
        ];

        $sAdresseIp      = $this->request->getClientAddress();
        //echo $sAdresseIp;die;
        if (false === in_array($sAdresseIp, $aListeBlancheIp)) {
            throw new \Exception('Accès interdit à cette page', 401);

            return false;
        }

        if ($this->request->getHeader('ORIGIN')) {
            $sOrigine = $this->request->getHeader('ORIGIN');
        } else {
            $sOrigine = '*';
        }

        //Ajout des informations CORS - Cross-Origin Resource Sharing
        $this->response
            ->setHeader('Access-Control-Allow-Origin', $sOrigine)
            ->setHeader(
                'Access-Control-Allow-Methods',
                'GET,PUT,POST,DELETE,OPTIONS'
            )
            ->setHeader('Access-Control-Allow-Headers',
                'Origin, X-Requested-With, Content-Range, ' .
                'Content-Disposition, Content-Type, Authorization'
            )
            ->setHeader('Access-Control-Allow-Credentials', 'true');

        return true;
    }

    // Avant l'exécution d'une route
    public function beforeExecuteRoute(Event $oEvent, Dispatcher $oDispatcher)
    {
        $sParametres = $this->request->getRawBody();

        if('' !== $sParametres){
            //Vérification des données reçu
            json_decode($this->request->getRawBody());
            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new \Exception('JSON malformé', 500);

                return false;
            }
        }

        return true;
    }

    // Gestion de page introuvable
    public function beforeNotFoundAction()
    {
        throw new \Exception('Page introuvable', 404);

        return false;
    }

    public function beforeException(Event $oEvent, Dispatcher $oDispatcher, \Exception $oException)
    {
        $nCode          = 500;
        $sMessageStatus = 'Serveur Erreur';

        if (true === in_array($oException->getCode(), [ 401, 404 ])) {
            $nCode          = $oException->getCode();
            $sMessageStatus = $oException->getMessage();
        }

        $this->response->setJsonContent(
            [
                'code'    => $oException->getCode(),
                'status'  => 'erreur',
                'message' => $oException->getMessage(),
            ]
        );

        $this->response->setStatusCode($nCode, $sMessageStatus);

        return $this->response->send();
    }
}