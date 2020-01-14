<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function onConstruct(){
        // Les feuilles de style dans l'entete du site
        $oEnteteCollection = $this->assets->collection('entete');

        $oEnteteCollection->addCss('css/site.css');
        $oEnteteCollection->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false);

        $oEnteteCollection->addFilter(
            new Phalcon\Assets\Filters\Cssmin()
        );

        $oEnteteCollection->join(true);

        // Le nom et le chemin du fichier CSS contenant les données précédentes.
        $oEnteteCollection->setTargetPath('css/minify.css');
        $oEnteteCollection->setTargetUri('css/minify.css');

        // Les fichiers Javascript se placent en bas de fichier HTML
        $oPiedPageCollection = $this->assets->collection('pied_de_page');
        $oPiedPageCollection->addJs('js/site.js');        
        
        $oPiedPageCollection->addJs('https://code.jquery.com/jquery-3.3.1.slim.min.js', false);
        $oPiedPageCollection->addJs('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', false);
        $oPiedPageCollection->addJs('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', false);

        $oPiedPageCollection->addFilter(
            new Phalcon\Assets\Filters\Jsmin()
        );

        $oPiedPageCollection->join(true);

        // Le nom et le chemin du fichier JS contenant les données précédentes.
        $oPiedPageCollection->setTargetPath('js/minify.js');
        $oPiedPageCollection->setTargetUri('js/minify.js');
    }
}
