<?php

namespace HelloWorld\Forms;

use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Form;

class Chap6Form extends Form
{
    public function initialize()
    {
        /** TYPE TEXTE */
        // nom
        $oNom = new Text('nom', [
            'placeholder' => ucfirst('nom'),
            'class'       => 'form-control',
        ]);
        $oNom->setLabel(ucfirst('nom'));
        $this->add($oNom);

        /** TYPE MOT DE PASSE */
        // mot de passe
        $oMotDePasse = new Password('mot_de_passe', [
            'placeholder' => ucfirst('mot de passe'),
            'class'       => 'form-control',
        ]);
        $oMotDePasse->setLabel(ucfirst('mot de passe'));
        $this->add($oMotDePasse);

        /** TYPE LISTE DEROULANTE SIMPLE */
        // liste pays
        $oListePays = new Select('liste_pays',
            [
                'N/A' => 'Choisir un pays',
                'FR'  => 'France',
                'UK'  => 'United Kingdom'
            ],
            [
                'useEmpty' => false,
                'class'    => 'form-control',
            ]);
        $oListePays->setLabel(ucfirst('liste de pays'));
        $oListePays->setDefault('N/A');
        $this->add($oListePays);

        /** TYPE LISTE DEROULANTE MULTIPLE */
        // liste pays
        $oListeAllergies = new Select('liste_allergies[]',
            [
                'N/A'    => 'Choisir un ou des produits',
                'ARA'    => 'Arachides',
                'BANANA' => 'Bananes',
                'OEUF'   => 'Oeufs'
            ],
            [
                'useEmpty' => false,
                'class'    => 'form-control',
                'multiple' => true
            ]);
        $oListeAllergies->setLabel(ucfirst('liste de produits allergiques'));
        $oListeAllergies->setDefault('N/A');
        $this->add($oListeAllergies);


        /**  TYPE CASE UNIQUE A CHOISIR */
        // cookies
        $oAccepteCookies = new Radio('accepte_cookie',
            [
                'class' => 'form-control',
                'name'  => 'cookies',
                'value' => 1
            ]);
        $oAccepteCookies->setLabel(ucfirst("j'accepte les cookies"));
        $this->add($oAccepteCookies);

        $oRefuseCookies = new Radio('refuse_cookie',
            [
                'class' => 'form-control',
                'name'  => 'cookies',
                'value' => '0'
            ]);
        $oRefuseCookies->setLabel(ucfirst('je refuse les cookies'));
        $this->add($oRefuseCookies);

        /**  TYPE CASE A COCHER */
        // activites
        $oVelo = new Check('velo',
            [
                'name'  => 'activites[]',
                'class' => 'form-control',
                'value' => ucfirst('vélo')
            ]);
        $oVelo->setLabel(ucfirst('vélo'));
        $this->add($oVelo);

        $oBadminton = new Check('badminton',
            [
                'name'  => 'activites[]',
                'class' => 'form-control',
                'value' => ucfirst('badminton')
            ]);
        $oBadminton->setLabel(ucfirst('badminton'));
        $this->add($oBadminton);

        $oTennis = new Check('tennis',
            [
                'name'  => 'activites[]',
                'class' => 'form-control',
                'value' => ucfirst('tennis')
            ]);
        $oTennis->setLabel(ucfirst('tennis'));
        $this->add($oTennis);

        /**  TYPE ZONE DE TEXTE */
        // commentaires
        $oCommentaire = new TextArea('commentaires', [
            'placeholder' => ucfirst('commentaires'),
            'class'       => 'form-control',
            'cols'        => 10,
            'rows'        => 5
        ]);
        $oCommentaire->setLabel(ucfirst('commentaires'));
        $this->add($oCommentaire);

        /**  TYPE CHAMP CACHE */
        // utilisateur_id
        $oUtilisateurID = new Hidden('utilisateur_id');
        $this->add($oUtilisateurID);

        /**  TYPE FICHIER */
        // photo de profil
        $oPhotoDeProfil = new File('photo_de_profil', [
            'class' => 'form-control',
        ]);
        $oPhotoDeProfil->setLabel(ucfirst('photo de profil'));
        $this->add($oPhotoDeProfil);

        /**  TYPE DATE */
        // date de naissance
        $oDateDeNaissance = new Date('date_de_naissance', [
            'placeholder' => ucfirst('date de naissance'),
            'class'       => 'form-control',
        ]);
        $oDateDeNaissance->setLabel(ucfirst('date de naissance'));
        $this->add($oDateDeNaissance);

        /**  TYPE NUMERIQUE */
        // Nombre de chiens
        $oNombreDeChiens = new Numeric('nombre_de_chiens', [
            'placeholder' => ucfirst('nombre de chiens'),
            'class'       => 'form-control',
        ]);
        $oNombreDeChiens->setLabel(ucfirst('nombre de chiens'));
        $this->add($oNombreDeChiens);

        /**  TYPE BOUTON DE SOUMISSION DE FORMULAIRE */
        // bouton de soumission
        $oBoutonDeSoumission = new Submit('bouton_de_soumission', [
            'class' => 'btn btn-primary',
        ]);
        $oBoutonDeSoumission->setDefault(ucfirst('envoyer'));

        $this->add($oBoutonDeSoumission);
    }
}