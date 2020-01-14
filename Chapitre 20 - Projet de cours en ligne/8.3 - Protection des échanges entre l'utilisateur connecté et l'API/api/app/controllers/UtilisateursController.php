<?php

use NovaMooc\Models\Utilisateurs;

class UtilisateursController extends ControllerBase
{
    /**
     * @api {get} /api/cours Récupére les cours gérés par l'utilisateur
     * @apiName coursUtilisateur
     * @apiGroup Utilisateurs
     * @apiExample {curl} Exemple d'utilisation:
     *     curl -i -X GET -d '{"token":"..."}' http://127.0.0.1/api/cours
     *
     * @apiSuccess {Array} payload Contient un tableau de cours
     *
     * @apiVersion 0.0.1
     */
    public function coursAction()
    {
        $oParametre     = $this->request->getJsonRawBody();

        $nUtilisateurId = SecurityPlugin::getUtilisateurIdFromToken($this->config,$oParametre->token);

        $oUtilisateur   = Utilisateurs::findFirstById($nUtilisateurId);

        if($oUtilisateur instanceof Utilisateurs){
            return $oUtilisateur->cours;
        }
    }
}