<?php

namespace HelloWorld\Forms;

use Phalcon\Forms\Element\Select;

class ListeDeroulantePersonnalise extends Select
{
    protected $aAttributeOption = [];

    public function __construct($elementName, $elementValues = NULL, $parameters = NULL, $attributeOption = NULL)
    {
        $this->aAttributeOption = $attributeOption;
        parent::__construct($elementName, $elementValues, $parameters);
    }

    public function render($attributes = null)
    {

        $sHTML = '<select name="' . $this->getName() . '" id="' . $this->getName() . '" ';

        // Récupération des propriétés HTML
        $aAttributs = $this->getAttributes();
        if (false === empty($aAttributs)) {
            foreach ($aAttributs as $sNom => $sValeur) {
                $sHTML .= ' ' . $sNom . '="' . $sValeur . '"';
            }
        }

        $sHTML .= '>';

        // Récupération des éléments de la liste
        $aOptions       = parent::getOptions();

        // Récupération de la valeur ou des valeurs par défauts
        $oValeurDefault = parent::getDefault();

        if (false === empty($this->aAttributeOption) && false === empty($aOptions)) {

            foreach ($aOptions as $oCle => $sValeur) {
                // Création des éléments de la liste
                $sHTML .= '<option value="' . $oCle . '" ';

                // Gestion d'un élément ou plusieurs éléments sélectionnés par défaut
                if (false === is_null($oValeurDefault) && ((true === is_string($oValeurDefault) && $oCle === $oValeurDefault) ||
                        (true === is_array($oValeurDefault) && true === in_array($oCle,$oValeurDefault)))) {
                    $sHTML .= ' selected="selected"';
                }

                // Ajout des propriétés data-
                foreach ($this->aAttributeOption[$oCle] as $sNomAttribut => $sValeurAttribut) {
                    $sHTML .= ' ' . $sNomAttribut . '="' . $sValeurAttribut . '" ';
                }

                $sHTML .= '>';

                $sHTML .= $sValeur . '</option>';
            }
        }

        $sHTML .= '</select>';

        // Renvoi du code HTML
        return $sHTML;
    }
}