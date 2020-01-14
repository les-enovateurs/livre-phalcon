<?php


namespace HelloWorld\Models;


class UtilisateursAchatsProduits extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->belongsTo('produits_id', Produits::class, 'id', [
            'reusable' => true,
            'alias'    => 'produits'
        ]);

        $this->belongsTo('utilisateurs_id', Utilisateurs::class, 'id', [
            'reusable' => true,
            'alias'    => 'utilisateurs',
            'foreignKey' => [
                'message'    => "Il manque l'utilisateur_id",
            ]
        ]);
    }
}