<?php

namespace HelloWorld\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;

use HelloWorld\Models\Utilisateurs;

class UtilisateurForm extends Form
{
    public function initialize(Utilisateurs $oUtilisateur = null)
    {
        // nom
        $sNom = new Text('nom', [
            'placeholder' => ucfirst('nom'),
            'class'       => 'form-control',
        ]);
        $sNom->setLabel(ucfirst('nom'));
        $this->add($sNom);

        // prenom
        $sPrenom = new Text('prenom', [
            'placeholder' => ucfirst('prénom'),
            'class'       => 'form-control',
        ]);
        $sPrenom->setLabel(ucfirst('prénom'));
        $this->add($sPrenom);

        // email
        $sEmail = new Text('email', [
            'placeholder' => ucfirst('email'),
            'class'       => 'form-control',
        ]);
        $sEmail->setLabel(ucfirst('email'));
        $this->add($sEmail);

        // mot de passe
        $sMotDePasse = new Text('mot_de_passe', [
            'placeholder' => ucfirst('mot de passe'),
            'class'       => 'form-control',
        ]);
        $sMotDePasse->setLabel(ucfirst('mot de passe'));
        $this->add($sMotDePasse);

        // id
        $sId = new Hidden('id');
        $this->add($sId);

        $oBoutonDeSoumission = new Submit('bouton_de_soumission', [
            'class' => 'btn btn-primary',
        ]);
        $oBoutonDeSoumission->setDefault(ucfirst('envoyer'));

        $this->add($oBoutonDeSoumission);
    }
}