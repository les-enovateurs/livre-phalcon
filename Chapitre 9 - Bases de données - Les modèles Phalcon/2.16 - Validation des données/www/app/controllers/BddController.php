<?php

use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

class BddController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function connexionSQLAction()
    {
        $this->view->utilisateurs = Utilisateurs::find();
    }

    public function validateurMessageSQLAction()
    {
        $oUtilisateur        = new Utilisateurs();
        $oUtilisateur->email = 'sebastien.doe@les-enovateurs.com';
        $oUtilisateur->nom   = 'DOE';

        if ($oUtilisateur->save() === false) {
            $aMessages = $oUtilisateur->getMessages();

            $aListeMessages = [];

            foreach ($aMessages as $oMessage) {
                $aListeMessages[] = 'Champ : ' . $oMessage->getField() . ' - Type: ' . $oMessage->getType() . ' - Message: ' . $oMessage->getMessage();
            }

            $this->view->liste_messages = $aListeMessages;
        }
    }
}

