<?php

use Phalcon\Filter;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function inscriptionAction()
    {
        if(true === $this->request->isPost()){
            $sEmail      = $this->request->getPost('email', 'email', 'contact@les-enovateurs.com');
            $sMotDePasse = $this->request->getPost('mot_de_passe');
    
            $this->view->email        = $sEmail;
            $this->view->mot_de_passe = $sMotDePasse;
            $this->view->avec_post    = $this->request->isPost();
            $this->view->avec_ajax    = $this->request->isAjax();


            /** EXEMPLE de filtrage */
            $oFilter = new Filter();

            /** INT */
            $this->view->int_sans_filtre = 'sdf-sd12356sq';
            $this->view->int_avec_filtre = $oFilter->sanitize($this->view->int_sans_filtre, 'int');

            /** ABSINT */
            $this->view->absint_sans_filtre = '-1213';
            $this->view->absint_avec_filtre = $oFilter->sanitize($this->view->absint_sans_filtre, 'absint');

            /** INT! */
            $this->view->cast_int_sans_filtre = '4.2';
            $this->view->cast_int_avec_filtre = $oFilter->sanitize($this->view->cast_int_sans_filtre, 'int!');

            /** FLOAT */
            $this->view->float_sans_filtre = '621c6<3.62e3z';
            $this->view->float_avec_filtre = $oFilter->sanitize($this->view->float_sans_filtre, 'float');
            
            /** FLOAT! */
            $this->view->cast_float_sans_filtre = '-122.3434e3';
            $this->view->cast_float_avec_filtre = $oFilter->sanitize($this->view->cast_float_sans_filtre, 'float!');
            
            /** STRING */
            $this->view->string_sans_filtre = 'je poste un commentaire <>';
            $this->view->string_avec_filtre = $oFilter->sanitize($this->view->string_sans_filtre, 'string');
            
            /** ALPHA-NUMERIQUE */
            $this->view->alphanum_sans_filtre = '&é"(*^$test1-*/';
            $this->view->alphanum_avec_filtre = $oFilter->sanitize($this->view->alphanum_sans_filtre, 'alphanum');
            
            /** TRIM */
            $this->view->trim_sans_filtre = ' Camille et Damien sont admis ';
            $this->view->trim_avec_filtre = $oFilter->sanitize($this->view->trim_sans_filtre, 'trim');
            
            /** STRIPTAGS */
            $this->view->striptags_sans_filtre = '<b>Un nouveau paragraphe</b><br />';
            $this->view->striptags_avec_filtre = $oFilter->sanitize($this->view->striptags_sans_filtre, 'striptags');

            /** UPPER */
            $this->view->upper_sans_filtre = 'un texte en minuscule';
            $this->view->upper_avec_filtre = $oFilter->sanitize($this->view->upper_sans_filtre, 'upper');

            /** LOWER */
            $this->view->lower_sans_filtre = 'UN TEXTE EN MAJUSCULE';
            $this->view->lower_avec_filtre = $oFilter->sanitize($this->view->lower_sans_filtre, 'lower');

            /** EMAIL */
            $this->view->email_sans_filtre = 'sebas(tien)@les-\enovateurs.com';
            $this->view->email_avec_filtre = $oFilter->sanitize($this->view->email_sans_filtre, 'email');

            /** URL */
            $this->view->url_sans_filtre = 'http://les-éléphants.com';
            $this->view->url_avec_filtre = $oFilter->sanitize($this->view->url_sans_filtre, 'url');

            /** SPECIAL CHARS */
            $this->view->special_chars_sans_filtre = '1 > 2';
            $this->view->special_chars_avec_filtre = $oFilter->sanitize($this->view->special_chars_sans_filtre, 'special_chars');
        }
    }
}


