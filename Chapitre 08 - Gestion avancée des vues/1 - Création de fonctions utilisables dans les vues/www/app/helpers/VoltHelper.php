<?php

namespace HelloWorld\Helpers;

class VoltHelper
{
    public static function afficheUtilisateur($sPrenom, $sNom){
        $sHtml = '<p>Prénom : '.$sPrenom.' </p>';
        $sHtml .= '<p>Nom : '.$sNom.' </p>';
        return $sHtml;
    }
}