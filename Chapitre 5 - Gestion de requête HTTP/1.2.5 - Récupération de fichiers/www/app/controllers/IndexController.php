<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function photoAction(){
        $aInfoFichiers = [];

        // Vérification qu'il y a des fichiers dans la requête HTTP
        if (true == $this->request->hasFiles()) {

            //Récupération du ou des fichiers envoyés.
            $aFichiers = $this->request->getUploadedFiles();
            
            //Parcours des fichiers
            foreach ($aFichiers as $oFichier) {

                $aInfoFichiers[] = [
                    'nom'               => $oFichier->getName(),
                    'type_navigateur'   => $oFichier->getType(),
                    'type_fichier'      => $oFichier->getRealType(),
                    'taille'            => $oFichier->getSize(),
                    'extension'         => $oFichier->getExtension(),
                    'chemin_temporaire' => $oFichier->getTempName(),
                    'erreur'            => $oFichier->getError(),
                ];

                //Récupération des fichiers sur le serveur
                $oFichier->moveTo(
                    'files/' . $oFichier->getName()
                );
                
            }
        }

        $this->view->info_fichiers = $aInfoFichiers;
    }

}

