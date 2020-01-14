<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $sGoogleKey = $this->config->google_api->key;

        $sGoogleKey = $this->config->get('google_api')->get('key');

        $sGoogleKey = $this->config->path('google_api.key');

        $this->view->google_key_objet = $this->config->google_api->key;

        $this->view->google_key_get = $this->config->get('google_api')->get('key');

        $this->view->google_key_path = $this->config->path('google_api.key');
    }

}

