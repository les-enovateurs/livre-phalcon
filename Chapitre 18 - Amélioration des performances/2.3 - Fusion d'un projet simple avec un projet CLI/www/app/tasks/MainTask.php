<?php

class MainTask extends \Phalcon\Cli\Task
{
    public function mainAction()
    {
        echo "Congratulations! You are now flying with Phalcon CLI!";
    }

    public function presentationAction($sNom, $sPrenom, $sVille)
    {
        echo 'Notre candidat du jour est ' . $sNom . ' ' . $sPrenom . ' habitant à ' . $sVille;
    }
}
