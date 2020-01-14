<?php

namespace HelloWorld\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

use Phalcon\Mvc\Model\Behavior\Timestampable;
use Phalcon\Mvc\Model\Behavior\SoftDelete;

use DateTime;
use DateTimeZone;

class Utilisateurs extends \Phalcon\Mvc\Model
{

    const ETAT_SUPPRIME = 5;
    const ETAT_ACTIF    = 1;
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
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("utilisateurs");

        $this->addBehavior(
            new Timestampable(
                [
                    'beforeUpdate' => [
                        'field'  => 'mise_a_jour_le',
                        'format' => 'Y-m-d',
                    ]
                ]
            )
        );

        $this->addBehavior(
            new Timestampable(
                [
                    'beforeCreate' => [
                        'field'     => 'cree_le',
                        'generator' => function () {
                            $oDateTemps = new Datetime(null,new DateTimeZone('Europe/Paris'));

                            return $oDateTemps->format('Y-m-d H:i:sP');
                        }
                    ]
                ]
            )
        );

        $this->addBehavior(
            new SoftDelete(
                [
                    'field' => 'etat',
                    'value' => Utilisateurs::ETAT_SUPPRIME,
                ]
            )
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'utilisateurs';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     *
     * @return Utilisateurs[]|Utilisateurs|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     *
     * @return Utilisateurs|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
