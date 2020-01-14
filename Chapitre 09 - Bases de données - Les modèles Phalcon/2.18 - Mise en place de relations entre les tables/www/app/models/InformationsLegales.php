<?php


namespace HelloWorld\Models;


class InformationsLegales extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasOne(
            [ 'entreprises_id' ],
            Entreprises::class,
            [ 'id' ],
            [
                'alias' => 'entreprise',
            ]
        );
    }
}