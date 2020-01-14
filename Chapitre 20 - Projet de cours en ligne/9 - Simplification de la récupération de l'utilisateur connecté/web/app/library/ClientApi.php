<?php

namespace NovaMooc\Library;

use GuzzleHttp\Client as GuzzleClient;

class ClientApi
{
    const METHOD_ACCEPT = [ 'GET', 'POST', 'PUT', 'DELETE' ];
    private $oClient;
    private $oSession;

    public function __construct($sUrlApi = null, $oSession)
    {
        $oClient       = new GuzzleClient([
            'base_uri' => $sUrlApi,
            'timeout'  => 2,
            'headers'  => [
                'User-Agent' => 'MoocWeb/1.0',
                'Accept'     => 'application/json',
            ]
        ]);
        $this->oClient = $oClient;
        $this->oSession = $oSession;
    }

    public function __call($sMethode, $aProprietes)
    {
        $sRoute      = $aProprietes[0];
        $aParametres = [];

        if (count($aProprietes) > 1) {
            $aParametres = $aProprietes[1];
        }

        $sMethode = strtoupper($sMethode);

        if (false === in_array($sMethode, self::METHOD_ACCEPT)) {
            throw new \Exception('La méthode ' . $sMethode . ' est bloquée', 500);
            return false;
        }

        $aParametres = array_merge($aParametres, [ 'token' => $this->oSession->get('token') ]);

        $oReponse = $this->oClient->request(strtoupper($sMethode), $sRoute, [ 'json' => $aParametres ]);

        $oContenu = json_decode($oReponse->getBody());

        return $oContenu->payload;
    }
}