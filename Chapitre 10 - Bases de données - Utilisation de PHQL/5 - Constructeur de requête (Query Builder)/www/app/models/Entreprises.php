<?php

namespace HelloWorld\Models;

class Entreprises extends \Phalcon\Mvc\Model
{
    public function initialize()
    {
        $this->hasMany('id', 'HelloWorld\Models\Utilisateurs', 'entreprises_id', [ 'alias' => 'utilisateurs' ]);
    }
}