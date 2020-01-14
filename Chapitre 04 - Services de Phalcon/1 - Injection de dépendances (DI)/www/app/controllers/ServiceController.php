<?php

use Phalcon\Mvc\View;

class ServiceController extends ControllerBase
{

    public function simpleAction()
    {
        $oPDF       = $this->di->get('fpdf');
        $sCheminPDF =  '/public/files/exemple_service_simple.pdf';

        $oPDF->Output('F',  BASE_PATH . $sCheminPDF);

        $this->view->url_pdf = $sCheminPDF;
    }

    public function anonymeAction()
    {
        $oPDF       = $this->di->get('fpdf_entete');
        $sCheminPDF =  '/public/files/exemple_service_fonction_anonyme.pdf';

        $oPDF->Output('F',  BASE_PATH . $sCheminPDF);

        $this->view->url_pdf = $sCheminPDF;
    }

    public function parametreAction()
    {
        $this->view->parametre = $this->di->get('passage_configuration');
    }

    public function partageAction()
    {
        $aConfigPartage = $this->di->get('config_partage');

        $aConfigPartage['nouveau'] = 'test';

        $this->view->config_partage = $this->di->get('config_partage');
    }
}