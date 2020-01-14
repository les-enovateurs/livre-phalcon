<?php

use Phalcon\Html\Breadcrumbs;

use Phalcon\Escaper;
use Phalcon\Html\TagFactory;

use Phalcon\Html\Helper\Anchor;
use Phalcon\Html\Helper\AnchorRaw;
use Phalcon\Html\Helper\Body;
use Phalcon\Html\Helper\Button;
use Phalcon\Html\Helper\Close;
use Phalcon\Html\Helper\Element;
use Phalcon\Html\Helper\ElementRaw;
use Phalcon\Html\Helper\Form;
use Phalcon\Html\Helper\Img;
use Phalcon\Html\Helper\Label;
use Phalcon\Html\Helper\TextArea;

class HtmlController extends ControllerBase
{
    public function demoAction()
    {
        $oEchappeur     = new Escaper();
        $oLien          = new Anchor($oEchappeur);
        
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
        ];

        $this->view->lienClassique = $oLien('/html/demo', '<i>DemoClassique</i>', $aOptions);

        $oLienBrute  = new AnchorRaw($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
        ];
        $this->view->lienBrute = $oLienBrute('/html/demo', '<i>Lien italique</i>', $aOptions);

        $oBouton  = new Button($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
        ];
        $this->view->bouton = $oBouton('Envoyer', $aOptions);

        $oImage  = new Img($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
            'width' => '500px'
        ];
        $this->view->image   = $oImage('/img/logo.png', $aOptions);

        $oZoneDeTexte  = new TextArea($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
        ];
        $this->view->zone_texte   = $oZoneDeTexte('un texte sympa', $aOptions);

        $oFermeture             = new Close($oEchappeur);
        $this->view->fin_formulaire   = $oFermeture('form');

        $oFormulaire  = new Form($oEchappeur);
        $aOptions = [
            'class'     => 'maClasse',
            'name'      => 'monNom',
            'id'        => 'monId_'.uniqid(),
            'method'    => 'post',
            'enctype'   => 'multipart/form-data'
        ];
        $this->view->formulaire = $oFormulaire($aOptions);

        $oCorps  = new Body($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'id'    => 'monId_'.uniqid(),
        ];
        $this->view->corps       = $oCorps($aOptions);
        $this->view->fin_corps   = $oFermeture('body');

        $oLibelle  = new Label($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
        ];
        $this->view->libelle        = $oLibelle($aOptions);
        $this->view->fin_libelle    = $oFermeture('label');

        $oElement  = new Element($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
            'cite'  => 'https://les-enovateurs.com/php-7-4-ameliorations-nouvelle-version/'
        ];

        $this->view->citation = $oElement('blockquote', '<b>Mise à jour de PHP 7.4</b>', $aOptions);

        $oElementBrute  = new ElementRaw($oEchappeur);
        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
            'cite'  => 'https://les-enovateurs.com/php-7-4-ameliorations-nouvelle-version/'
        ];
        $this->view->citation_brute = $oElementBrute('blockquote', '<b>Mise à jour de PHP 7.4</b>', $aOptions);

        $oFil = new Breadcrumbs();
        $oFil->add('Accueil', '/')
             ->add('Demo', '/html/demo')
             ->add('contact@les-enovateurs.com')
             ->add('Test', '/html/test');
             
        $oFil->remove('/html/test');
        $oFil->setSeparator('-');

        $this->view->fil = $oFil;

        $oFabrique      = new TagFactory($oEchappeur);
        $oLienFabrique  = $oFabrique->newInstance('a');

        $aOptions = [
            'class' => 'maClasse',
            'name'  => 'monNom',
            'id'    => 'monId_'.uniqid(),
        ];

        $this->view->lienFabrique = $oLienFabrique('/html/demo', 'Demo', $aOptions);
    }
}