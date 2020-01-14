<?php

namespace HelloWorld\Models;

class Produits extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasMany('id', UtilisateursAchatsProduits::class, 'produits_id');

        $this->hasManyToMany(
            'id',
            UtilisateursAchatsProduits::class,
            'produits_id', 'utilisateurs_id',
            Utilisateurs::class,
            'id',
            [ 'alias' => 'utilisateursAchat' ]
        );
    }
}
