<?php

class MainTask extends \Phalcon\Cli\Task
{
    public function mainAction()
    {
        echo "Congratulations! You are now flying with Phalcon CLI!";
    }

    public function presentationAction(array $aParametres)
    {
        $sNom    = $aParametres[0];
        $sPrenom = $aParametres[1];
        $sVille  = $aParametres[2];

        echo 'Notre candidat du jour est ' . $sNom . ' ' . $sPrenom . ' habitant à ' . $sVille;
    }
}
