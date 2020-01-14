<?php

use Phalcon\Crypt;

use Phalcon\Security\Random;

class SecuriteController extends ControllerBase
{

    public function crypterAction()
    {
        //Cryptage simple
        $oCryptage = new Crypt();

        //Liste de cipher
        //https://www.php.net/manual/en/function.openssl-get-cipher-methods.php
        $oCryptage->setCipher('aes-256-ctr');

        $oCryptageAvecHash = new Crypt();
        $oCryptageAvecHash->setCipher('blowfish');
        $oCryptageAvecHash->setHashAlgo('md2');
        $oCryptageAvecHash->useSigning(true);

        $sCle    = "TvjC+R5L;v!8H#4S=2ctW&gU6G2)^Q?zm!2n]MpxNB0@kS&%um8N,BKQ/Jw0DA~";
        $sPhrase = 'J\'adore le blog Les enovateurs';

        $this->view->phrase_a_crypter                = $sPhrase;
        $this->view->phrase_crypte                   = $oCryptage->encrypt($sPhrase, $sCle);
        $this->view->phrase_crypte_avec_hash         = $oCryptageAvecHash->encrypt($sPhrase, $sCle);
        $this->view->phrase_crypte_avec_service      = $this->cryptage_avec_cle->encrypt($sPhrase);
        $this->view->phrase_crypte_base_64           = $oCryptage->encryptBase64($sPhrase, $sCle);
        $this->view->phrase_crypte_avec_hash_base_64 = $oCryptageAvecHash->encryptBase64($sPhrase, $sCle);
        $this->view->liste_algorithme_hash           = $oCryptage->getAvailableHashAlgos();

        $this->view->phrase_decrypte                   = $oCryptage->decrypt($this->view->phrase_crypte, $sCle);
        $this->view->phrase_decrypte_avec_hash         = $oCryptageAvecHash->decrypt($this->view->phrase_crypte_avec_hash, $sCle);
        $this->view->phrase_decrypte_avec_service      = $this->cryptage_avec_cle->decrypt($this->view->phrase_crypte_avec_service);
        $this->view->phrase_decrypte_base_64           = $oCryptage->decryptBase64($this->view->phrase_crypte_base_64, $sCle);
        $this->view->phrase_decrypte_avec_hash_base_64 = $oCryptageAvecHash->decryptBase64($this->view->phrase_crypte_avec_hash_base_64, $sCle);
    }

    public function hashAction()
    {
	$sMotDePasse = '';
        if(true === $this->request->has('mot_de_passe')){
            $sMotDePasse        = $this->request->getPost('mot_de_passe');
        }

        $sMotDePasseAttendu = 'azerty';

        $this->view->mot_de_passe_a_saisir           = $sMotDePasseAttendu;
        $this->view->mot_de_passe_a_saisir_avec_hash = $this->security->hash($sMotDePasseAttendu);
        $this->view->mot_de_passe_avec_hash          = $this->security->hash($sMotDePasse);
        $this->view->mot_de_passe_valide             = $this->security->checkHash($sMotDePasse, $this->view->mot_de_passe_a_saisir_avec_hash);
    }

    public function csrfAction()
    {

        $this->view->token_valide = 'formulaire non-envoyé';

        //Attention sans session cela ne fonctionne pas.
        if (true === $this->request->isPost()) {
            if (true === $this->security->checkToken()) {
                // Token valide
                $this->view->token_valide = 'valide';
            } else {
                $this->view->token_valide = 'invalide';
            }
        }

        $this->view->token     = $this->security->getToken();
        $this->view->cle_token = $this->security->getTokenKey();
    }

    public function aleatoireAction()
    {
        $oAleatoire = new Random();

        $nLongueur = 10;

        $this->view->longueur = $nLongueur;

        $this->view->chaine_binaire_aleatoire          = $oAleatoire->bytes();
        $this->view->chaine_binaire_longueur_aleatoire = $oAleatoire->bytes($nLongueur);

        $this->view->chaine_hexadecimal_aleatoire          = $oAleatoire->hex();
        $this->view->chaine_hexadecimal_longueur_aleatoire = $oAleatoire->hex($nLongueur);

        $this->view->chaine_base58_aleatoire          = $oAleatoire->base58();
        $this->view->chaine_base58_longueur_aleatoire = $oAleatoire->base58($nLongueur);

        $this->view->chaine_base62_aleatoire          = $oAleatoire->base62();
        $this->view->chaine_base62_longueur_aleatoire = $oAleatoire->base62($nLongueur);

        $this->view->chaine_base64_aleatoire          = $oAleatoire->base64();
        $this->view->chaine_base64_longueur_aleatoire = $oAleatoire->base64($nLongueur);

        $this->view->chaine_base64_pour_url_aleatoire           = $oAleatoire->base64Safe();
        $this->view->chaine_base64_pouur_url_longueur_aleatoire = $oAleatoire->base64Safe($nLongueur);

        $this->view->chaine_uuid_aleatoire          = $oAleatoire->uuid();

        $this->view->chaine_nombre_longueur_aleatoire = $oAleatoire->number($nLongueur);
    }

}

