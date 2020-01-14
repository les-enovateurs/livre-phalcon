<?php

namespace HelloWorld\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;


class UtilisateurForm extends Form
{
    public function initialize($oPreference)
    {
        // pays
        $sPays = new Text('pays', [
            'placeholder' => ucfirst('pays'),
            'class'       => 'form-control',
        ]);
        $sPays->setLabel(ucfirst('pays'));
        $this->add($sPays);

        // cookies
        $sCookie = new Text('cookies', [
            'placeholder' => ucfirst('cookies'),
            'class'       => 'form-control',
        ]);
        $sCookie->setLabel(ucfirst('cookies'));
        $this->add($sCookie);

        $oBoutonDeSoumission = new Submit('bouton_de_soumission', [
            'class' => 'btn btn-primary',
        ]);
        $oBoutonDeSoumission->setDefault(ucfirst('envoyer'));

        $this->add($oBoutonDeSoumission);
    }
}