<?php

namespace NovaMooc\Library;

use GuzzleHttp\Client as GuzzleClient;

class ClientApi
{
    const METHOD_ACCEPT = [ 'GET', 'POST', 'PUT', 'DELETE' ];
    private $oClient;

    public function __construct($sUrlApi = null)
    {
        $oClient        = new GuzzleClient([
            'base_uri' => $sUrlApi,
            'timeout'  => 2,
            'headers'  => [
                'User-Agent' => 'MoocWeb/1.0',
                'Accept'     => 'application/json',
            ]
        ]);
        $this->oClient  = $oClient;
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

        $oReponse = $this->oClient->request(strtoupper($sMethode), $sRoute, [ 'json' => $aParametres ]);

        $oContenu = json_decode($oReponse->getBody());

        return $oContenu->payload;
    }
}