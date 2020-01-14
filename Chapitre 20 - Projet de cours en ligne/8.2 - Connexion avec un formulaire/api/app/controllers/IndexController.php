<?php

use NovaMooc\Models\Utilisateurs;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function santeAction(){
        return ['etat' => 'A 100%, prêt à décrocher les étoiles !'];
    }

    public function connexionAction()
    {
        $oUtilisateur = $this->request->getJsonRawBody();

        $oUtilisateurConnexion = Utilisateurs::findFirst([
            'conditions' => 'email = :email: and mot_de_passe = :mot_de_passe:',
            'bind'       => [
                'email'        => $oUtilisateur->email,
                'mot_de_passe' => $oUtilisateur->mot_de_passe
            ]
        ]);

        if ($oUtilisateurConnexion instanceof Utilisateurs) {
            return [
                'utilisateur' => $oUtilisateurConnexion
            ];
        }

        return false;
    }
}

