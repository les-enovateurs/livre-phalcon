<?php

namespace HelloWorld\Models;

class Utilisateurs extends \Phalcon\Mvc\Model
{
    const FONCTION_STAGIAIRE   = 'stagiaire';
    const FONCTION_CADRE       = 'cadre';
    const FONCTION_CEO         = 'CEO';
    const FONCTION_CTO         = 'CTO';
    const FONCTION_RESPONSABLE = 'responsable';

    public function initialize()
    {
        $this->belongsTo('entreprises_id', Entreprises::class, 'id', [
            'alias' => 'entreprise'
        ]);

        $this->hasMany('id', UtilisateursAchatsProduits::class, 'utilisateurs_id');

        $this->hasManyToMany(
            'id',
            UtilisateursAchatsProduits::class,
            'utilisateurs_id', 'produits_id',
            Produits::class,
            'id',
            [ 'alias' => 'achatProduits' ]
        );
    }
}
