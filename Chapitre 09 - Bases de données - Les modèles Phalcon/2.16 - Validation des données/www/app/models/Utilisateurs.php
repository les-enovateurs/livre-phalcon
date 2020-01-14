<?php

namespace HelloWorld\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Mvc\Model\Message;

class Utilisateurs extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $nom;

    /**
     *
     * @var string
     */
    public $prenom;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $mot_de_passe;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Veuillez entrer un e-mail correct',
                ]
            )
        );

        $validator->add(
            'email',
            new Uniqueness(
                [
                    'message' => 'Le mail existe déjà en base de données',
                ]
            )
        );

        return $this->validate($validator);
    }

    public function getMessages($sFiltre = null): array
    {
        $aMessages = [];

        foreach (parent::getMessages() as $oMessage) {
            switch ($oMessage->getType()) {
                case 'InvalidCreateAttempt':
                    $oMessage->setMessage("L'utilisateur existe déjà");
                    break;

                case 'InvalidUpdateAttempt':
                    $oMessage->setMessage("L'utilisateur n'est pas modifiable car il n'existe pas.");
                    break;

                case 'PresenceOf':
                    $oMessage->setMessage('Le champs ' . $oMessage->getField() . ' est obligatoire');
                    break;
            }

            $aMessages[] = $oMessage;
        }

        return $aMessages;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("utilisateurs");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Utilisateurs[]|Utilisateurs|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Utilisateurs|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
