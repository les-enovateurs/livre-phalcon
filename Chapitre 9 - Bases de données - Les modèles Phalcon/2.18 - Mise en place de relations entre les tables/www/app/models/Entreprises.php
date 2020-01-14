<?php


namespace HelloWorld\Models;


class Entreprises extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasMany('id', Utilisateurs::class, 'entreprises_id', [ 'alias' => 'utilisateurs' ]);

        $this->hasMany('id', Utilisateurs::class, 'entreprises_id',
            [
                'alias'  => 'utilisateurCadre',
                'params' => [
                    'conditions' => 'fonction = :fonction:',
                    'bind'       => [
                        'fonction' => Utilisateurs::FONCTION_CADRE
                    ]
                ]
            ]
        );

        $this->hasMany('id', Utilisateurs::class, 'entreprises_id',
            [
                'alias'  => 'utilisateurCTO',
                'params' => [
                    'conditions' => 'fonction = :fonction:',
                    'bind'       => [
                        'fonction' => Utilisateurs::FONCTION_CTO
                    ]
                ]
            ]
        );

        $this->hasMany('id', Utilisateurs::class, 'entreprises_id',
            [
                'alias'  => 'utilisateurAutres',
                'params' => [
                    'conditions' => 'fonction <> :cto: and fonction <> :cadre:',
                    'bind'       => [
                        'cto'   => Utilisateurs::FONCTION_CTO,
                        'cadre' => Utilisateurs::FONCTION_CADRE
                    ]
                ]
            ]
        );

        $this->hasOne(
            [ 'id' ],
            InformationsLegales::class,
            [ 'entreprises_id' ],
            [
                'alias' => 'informationsLegales',
            ]
        );
    }
}