<?php

use HelloWorld\Models\Utilisateurs;

class UtilisateursController extends ControllerBase
{
    /**
     * @api {get} /api/utilisateurs/:id Récupération d'un utilisateur
     * @apiParam {Integer} id L'ID de l'utilisateur a récupéré.
     * @apiName infoUtilisateur
     * @apiGroup Utilisateurs
     * @apiExample {curl} Exemple d'utilisation:
     *     curl -i -X GET http://127.0.0.1/api/utilisateur/3
     *
     * @apiSuccess {Object} payload Contient les informations d'un utilisateur
     *
     * @apiVersion 0.0.1
     * @apiSampleRequest http://127.0.0.1/api/utilisateur/:id
     */
    public function infoUtilisateurAction()
    {
        $nId   = $this->dispatcher->getParam('id');
        return Utilisateurs::findById($nId);
    }

    /**
     * @api {post} /api/utilisateur Création d'un nouvel utilisateur
     * @apiName NouvelUtilisateur
     * @apiGroup Utilisateurs
     * @apiExample {curl} Exemple d'utilisation:
     *     curl -i -X POST -d '{"nom":"DOE","prenom":"Conor","email":"conor.doe@les-enovateurs.com", "mot_de_passe":"azert"}' http://127.0.0.1/api/utilisateur
     *
     * @apiSuccess {Object} payload Renvoie le nouvel utilisateur crée
     *
     * @apiVersion 0.0.1
     */
    public function nouvelAction()
    {
        $aUtilisateur = $this->request->getJsonRawBody(true);

        $oUtilisateur = new Utilisateurs();
        $bSauvegarde  = $oUtilisateur->save($aUtilisateur);

        if (true == $bSauvegarde) {
            return $oUtilisateur;
        } else {
            throw new \Exception('Utilisateur déjà existant', 500);
        }
    }
}