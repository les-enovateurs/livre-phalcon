<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $oClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://mooc-api/api/',
            'timeout'  => 2,
        ]);

        $oReponse = $oClient->request('GET', 'sante');

        $oContenu = json_decode($oReponse->getBody());

        $this->view->etat = $oContenu->payload->etat;
    }

}

