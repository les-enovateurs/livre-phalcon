<?php

namespace HelloWorld\Forms;

use Phalcon\Forms\Form;

class Chap6Form extends Form
{
    public function initialize()
    {
        $oInterval = new IntervalPersonnalise('poids');
        $oInterval->setLabel(ucfirst('interval de poids'));
        $this->add($oInterval);


        $oListePays = new ListeDeroulantePersonnalise('liste_pays',
        [
            'FR' => ucfirst('france'),
            'UK' => ucfirst('united Kingdom'),
            'USA' => ucfirst('united States of America')
        ],
        [
            'class' => 'form-control'
        ],
        [
            'FR' => [
                'data-devise' => '€',
                'data-langue' => ucfirst('français')
            ],
            'UK' => [
                'data-devise' => '£',
                'data-langue' => ucfirst('anglais')
            ],
            'USA' => [
                'data-devise' => '$',
                'data-langue' => ucfirst('anglais')
            ]
        ]
        );
        $oListePays->setDefault('UK');
        $oListePays->setLabel(ucfirst('liste de pays'));
        $this->add($oListePays);
    }
}