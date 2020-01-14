<?php

namespace HelloWorld\Forms;

use Chap6\Models\Utilisateurs;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\Between;
use Phalcon\Validation\Validator\Callback;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\CreditCard;
use Phalcon\Validation\Validator\Date;
use Phalcon\Validation\Validator\Digit;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\ExclusionIn;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\Url;

class Chap6Form extends Form
{
    public function initialize()
    {
        // nom_utilisateur
        $oNomUtilisateur = new Text('nom_utilisateur', [
            'placeholder' => ucfirst("nom d'utilisateur"),
            'class'       => 'form-control',
        ]);
        $oNomUtilisateur->setLabel(ucfirst("nom d'utilisateur"));

        /** VALIDATION ALPHANUMERIQUE */
        $oNomUtilisateur->addValidator(
            new Alnum(
                [
                    'message' => ucfirst("le nom de l'utilisateur doit être uniquement alphanumérique"),
                ]
            )
        );

        $this->add($oNomUtilisateur);

        // nom
        $oNom = new Text('nom', [
            'placeholder' => ucfirst('nom'),
            'class'       => 'form-control',
        ]);
        $oNom->setLabel(ucfirst('nom'));

        /** VALIDATION ALPHABETIQUE */
        $oNom->addValidator(
            new Alpha(
                [
                    "message" => ucfirst('le champ nom doit contenir uniquement des lettres'),
                ]
            )
        );

        $this->add($oNom);

        // pourcentage avancement
        $oPourcentageAvancement = new Numeric('pourcentage_avancement', [
            'placeholder' => ucfirst("pourcentage avancement"),
            'class'       => 'form-control',
        ]);
        $oPourcentageAvancement->setLabel(ucfirst("pourcentage avancement"));
        $this->add($oPourcentageAvancement);

        /** VALIDATION INTERVALLE DE VALEUR */
        $oPourcentageAvancement->addValidator(
            new Between(
                [
                    "minimum" => 0,
                    "maximum" => 100,
                    "message" => ucfirst('un pourcentage est compris entre 0 et 100'),
                ]
            )
        );

        $this->add($oPourcentageAvancement);

        // nombre de gateaux
        $oNombreDeGateaux = new Numeric('nombre_de_gateaux', [
            'placeholder' => ucfirst("nombre de gateaux"),
            'class'       => 'form-control',
        ]);
        $oNombreDeGateaux->setLabel(ucfirst("nombre de gateaux"));
        $this->add($oNombreDeGateaux);

        // nombre de part par gateaux
        $oNombreDePartParGateaux = new Numeric('nombre_de_part_par_gateaux', [
            'placeholder' => ucfirst("nombre de part par gateaux"),
            'class'       => 'form-control',
        ]);
        $oNombreDePartParGateaux->setLabel(ucfirst("nombre de part par gateaux"));

        /** VALIDATION PERSONNALISE */
        $oNombreDePartParGateaux->addValidator(
            new Callback(
                [
                    'callback' => function ($aData) {
                        if(true === is_numeric($aData['nombre_de_gateaux']) && true === is_numeric($aData['nombre_de_part_par_gateaux'])){
                        
                            if (0 === $aData['nombre_de_gateaux'] % $aData['nombre_de_part_par_gateaux']) {
                                return true;
                            }
                            
                        }

                        return false;
                    },
                    'message'  => ucfirst("la division entre le nombre de gateaux et le nombre de part par gateaux ne tombe pas sur un chiffre rond")
                ]
            )
        );
        $this->add($oNombreDePartParGateaux);

        // mot de passe
        $oMotDePasse = new Text('mot_de_passe', [
            'placeholder' => ucfirst("mot de passe"),
            'class'       => 'form-control',
        ]);
        $oMotDePasse->setLabel(ucfirst("mot de passe"));
        $this->add($oMotDePasse);

        // mot de passe confirme
        $oMotDePasseConfirme = new Text('mot_de_passe_confirme', [
            'placeholder' => ucfirst("mot de passe confirme"),
            'class'       => 'form-control',
        ]);
        $oMotDePasseConfirme->setLabel(ucfirst("mot de passe confirme"));

        /** VALIDATION CONFIRMATION DE VALEUR */
        $oMotDePasseConfirme->addValidator(
            new Confirmation(
                [
                    'message' => ucfirst("le mot de passe et la confirmation sont différents"),
                    'with'    => "mot_de_passe",
                ]
            )
        );

        $this->add($oMotDePasseConfirme);

        // carte de credit
        $oCarteDeCredit = new Numeric('carte_de_credit', [
            'placeholder' => ucfirst("carte de credit"),
            'class'       => 'form-control',
        ]);
        $oCarteDeCredit->setLabel(ucfirst("carte de credit"));

        /** VALIDATION NUMERO DE CARTE DE PAIEMENT */
        $oCarteDeCredit->addValidator(
            new CreditCard(
                [
                    'message' => ucfirst("le numéro de carte de paiement est incorrecte"),
                ]
            )
        );
        $this->add($oCarteDeCredit);

        // date de naissance
        $oDateDeNaissance = new Text('date_de_naissance', [
            'placeholder' => ucfirst("date de naissance"),
            'class'       => 'form-control',
        ]);
        $oDateDeNaissance->setLabel(ucfirst("date de naissance"));

        /** VALIDATION DATE */
        $oDateDeNaissance->addValidator(
            new Date(
                [
                    'format'  => 'd-m-Y',
                    'message' => ucfirst('la date est invalide'),
                ]
            )
        );

        $this->add($oDateDeNaissance);

        // quantite de fruits
        $oQuantiteDeFruits = new Numeric('quantite_de_fruits', [
            'placeholder' => ucfirst("quantite de fruits"),
            'class'       => 'form-control',
        ]);
        $oQuantiteDeFruits->setLabel(ucfirst("quantite de fruits"));

        /** VALIDATION NUMERIC */
        $oQuantiteDeFruits->addValidator(
            new Digit(
                [
                    'message' => ucfirst('la quantité de fruits doit être un entier')
                ]
            )
        );

        $this->add($oQuantiteDeFruits);

        // adresse mail
        $oAdresseMail = new Text('adresse_mail', [
            'placeholder' => ucfirst("adresse mail"),
            'class'       => 'form-control',
        ]);
        $oAdresseMail->setLabel(ucfirst("adresse mail"));

        /** VALIDATION EMAIL */
        $oAdresseMail->addValidator(
            new Email(
                [
                    'message' => ucfirst("l'adresse mail est incorrecte"),
                ]
            )
        );

        $this->add($oAdresseMail);

        // Reponse au QCM
        $oReponseQcm = new Text('reponse_qcm', [
            'placeholder' => ucfirst("ReponseQCM"),
            'class'       => 'form-control',
        ]);
        $oReponseQcm->setLabel(ucfirst("réponse au QCM (A-B-C-D)"));

        /** VALIDATION EXCLUSION DE VALEUR */
        $oReponseQcm->addValidator(
            new ExclusionIn(
                [
                    'message' => ucfirst('la réponse au QCM est incorrecte'),
                    'domain'  =>
                        [
                            'A',
                            'C',
                            'D'
                        ]
                ]
            )
        );

        $this->add($oReponseQcm);

        // photo de profil
        $oPhotoDeProfil = new File('photo_de_profil', [
            'class' => 'form-control',
        ]);
        $oPhotoDeProfil->setLabel(ucfirst('photo de profil'));

        /** VALIDATION FICHIER */
        $oPhotoDeProfil->addValidator(
            new \Phalcon\Validation\Validator\File(
                [
                    'maxSize'              => '1M',
                    'messageSize'          => ucfirst('la photo de profil dépasse la limite de taille (:max)'),
                    'allowedTypes'         => [
                        'image/jpeg',
                        'image/png',
                    ],
                    'messageType'          => ucfirst('le fichier doit être de type (:types)'),
                    'maxResolution'        => '800x600',
                    'minResolution'        => '400x300',
                    'messageMaxResolution' => ucfirst('la résolution maximale de la :field est :max'),
                    'messageMinResolution' => ucfirst('la résolution minimale de la :field est :min'),
                    'messageEmpty'         => ucfirst('un fichier est requis')
                ]
            )
        );

        $this->add($oPhotoDeProfil);

        $oConditionGeneral = new Check('condition_general',
            [
                'class' => 'form-control',
                'value' => 'oui'
            ]);
        $oConditionGeneral->setLabel(ucfirst('accepter les conditions générales'));

        /** VALIDATION VALEUR IDENTIQUE */
        $oConditionGeneral->addValidator(
            new Identical(
                [
                    'accepted' => 'oui',
                    'message'  => ucfirst('les conditions générales doivent être acceptées')
                ]
            )
        );

        $this->add($oConditionGeneral);

        // Taille de vetement
        $oTailleDeVetement = new Text('taille_de_vetement', [
            'placeholder' => ucfirst("taille de vetement"),
            'class'       => 'form-control',
        ]);
        $oTailleDeVetement->setLabel(ucfirst("taille de vetement"));

        /** VALIDATION INCLUSION DE VALEUR */
        $oTailleDeVetement->addValidator(
            new InclusionIn(
                [
                    'message' => ucfirst('les tailles de vetêment restant sont :domain'),
                    'domain'  =>
                        [
                            'L', 'XL', 'XXL'
                        ]
                ]
            )
        );

        $this->add($oTailleDeVetement);

        // nombre de livre
        $oNombreDeLivre = new Numeric('nombre_de_livre', [
            'placeholder' => ucfirst("nombre de livre"),
            'class'       => 'form-control',
        ]);
        $oNombreDeLivre->setLabel(ucfirst("nombre de livre"));


        $oNombreDeLivre->addValidators(
            [
                /** VALIDATION VALIDE NUMERIQUEMENT */
                new Numericality(
                    [
                        'message' => ucfirst("le nombre de livre n'est pas valide numériquement"),
                    ]
                ),
                /** VALIDATION NON NULLE */
                new PresenceOf(
                    [
                        'message' => ucfirst('le nombre de livre est obligatoire'),
                    ]
                )
            ]
        );

        $this->add($oNombreDeLivre);

        // numero de telephone
        $oNumeroDeTelephone = new Text('numero_de_telephone', [
            'placeholder' => ucfirst("numero de telephone"),
            'class'       => 'form-control',
        ]);
        $oNumeroDeTelephone->setLabel(ucfirst("numéro de téléphone"));

        /** VALIDATION EXPRESSION REGULIERE */
        $oNumeroDeTelephone->addValidator(
            new Regex(
                [
                    'message' => ucfirst('le numéro de téléphone est invalide'),
                    'pattern' => '#^0[0-9]([ .-]?[0-9]{2}){4}$#'
                ]
            )
        );
        $this->add($oNumeroDeTelephone);

        // Reference produit
        $oReferenceProduit = new Text('reference_produit', [
            'placeholder' => ucfirst("reference produit"),
            'class'       => 'form-control',
        ]);
        $oReferenceProduit->setLabel(ucfirst("reference produit"));

        /** VALIDATION NOMBRE DE CARACTERE */
        $oReferenceProduit->addValidator(
            new StringLength(
                [
                    'max'            => 10,
                    'min'            => 2,
                    'messageMaximum' => ucfirst('la référence doit faire au maximum (:max)'),
                    'messageMinimum' => ucfirst('la référence doit faire au minimum(:min)'),
                ]
            )
        );

        $this->add($oReferenceProduit);

        // prenom
        $oPrenom = new Text('prenom', [
            'placeholder' => ucfirst("prénom"),
            'class'       => 'form-control',
        ]);
        $oPrenom->setLabel(ucfirst("prénom"));

        /** VALIDATION VALEUR UNIQUE */
        $oPrenom->addValidator(
            new Uniqueness(
                [
                    'model'   => new Utilisateurs(),
                    'message' => ucfirst('le prénom existe déjà en base de données'),
                ]
            )
        );
        
        $this->add($oPrenom);
        
        // URL site web
        $oUrlSiteWeb = new Text('url_site_web', [
            'placeholder'   => ucfirst("URL site web"),
            'class'         => 'form-control',
        ]);
        $oUrlSiteWeb->setLabel(ucfirst("URL site web"));

        /** VALIDATION URL */
        $oUrlSiteWeb->addValidator(
            new Url(
                [
                    'message' => ucfirst("l'URL est incorrecte"),
                ]
            )
        );

        $this->add($oUrlSiteWeb);


        /**  TYPE BOUTON DE SOUMISSION DE FORMULAIRE */
        // bouton de soumission
        $oBoutonDeSoumission = new Submit('bouton_de_soumission', [
            'class' => 'btn btn-primary',
        ]);
        $oBoutonDeSoumission->setDefault(ucfirst('envoyer'));

        $this->add($oBoutonDeSoumission);


    }
}