<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class SecurityMiddleware implements MiddlewareInterface
{
    //Avant de gérer une requête extérieur
    public function beforeHandleRoute(Event $oEvent, Micro $app)
    {
        //Vérification de l'adresse IP entrante
        $aListeBlancheIp = [
            '127.0.0.1',
            '192.168.99.100',
            '192.168.48.1',
            '192.168.176.1',
            '::1'
        ];

        $sAdresseIp      = $app->request->getClientAddress();
        //echo $sAdresseIp;die;
        if (false === in_array($sAdresseIp, $aListeBlancheIp)) {
            throw new \Exception(
                'Accès interdit à cette page - (il faut modifier le fichier app/middlewares/SecurityMiddleware.php et décommenter la ligne 22 et mettre l\'adresse IP dans le tableau $aListeBlanche)'
                , 401);

            return false;
        }

        if ($app->request->getHeader('ORIGIN')) {
            $sOrigine = $app->request->getHeader('ORIGIN');
        } else {
            $sOrigine = '*';
        }

        //Ajout des informations CORS - Cross-Origin Resource Sharing
        $app->response
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
    public function beforeExecuteRoute(Event $oEvent, Micro $app)
    {
        $sParametres = $app->request->getRawBody();

        if('' !== $sParametres){
            //Vérification des données reçu
            json_decode($app->request->getRawBody());
            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new \Exception('JSON malformé', 500);

                return false;
            }
        }

        return true;
    }

    // Gestion de page introuvable
    public function beforeNotFound()
    {
        throw new \Exception('Page introuvable', 404);

        return false;
    }

    public function call(Micro $application)
    {
        return true;
    }
}