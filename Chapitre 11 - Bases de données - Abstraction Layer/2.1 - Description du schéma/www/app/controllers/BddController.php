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

    public function typeColonne($nType, $sPrefix)
    {
        $oColumnInformations = new ReflectionClass('\Phalcon\Db\Column');
        $aConstantes         = $oColumnInformations->getConstants();

        foreach ($aConstantes as $sNom => $sValeur) {
            if (false !== strpos($sNom, $sPrefix) && $sValeur === $nType) {
                return $sNom;
            }
        }
    }

    public function informationsSQLAction()
    {
        $aTables = $this->db->listTables('public');

        $this->view->tables = $aTables;

        $bUtilisateursExiste = $this->db->tableExists('utilisateurs');

        $aColonnes = $this->db->describeColumns('utilisateurs');

        $this->view->utilisateurs_existe = $bUtilisateursExiste;

        $aColonnesInfo = [];

        foreach ($aColonnes as $oColonne) {

            $aColonnesInfo[$oColonne->getName()] = [
                'Placé après la colonne : ' . $oColonne->getAfterPosition(),
                'Valeur par défaut : ' . $oColonne->getDefault(),
                'Type : Brute(' . $oColonne->getType() . ') - ' . $this->typeColonne($oColonne->getType(), 'TYPE_'),
                'Type construit PHP : Brute(' . $oColonne->getBindType() . ') - ' . $this->typeColonne($oColonne->getBindType(), 'BIND_'),
                'Taille maximum du contenu du champ : ' . $oColonne->getSize(),
                'Nombre de décimales après la virgule : ' . $oColonne->getScale(),
                'Est la première colonne : ' . $oColonne->isFirst(),
                'Est en auto-incrémentation : ' . $oColonne->isAutoIncrement(),
                'Contient obligatoirement une valeur : ' . $oColonne->isNotNull(),
                'Est numérique : ' . $oColonne->isNumeric(),
                'Est positif : ' . $oColonne->isUnsigned(),
            ];

        }

        $this->view->colonnes_informations = $aColonnesInfo;

        $aIndex     = $this->db->describeIndexes('utilisateurs');
        $aIndexInfo = [];

        foreach ($aIndex as $oIndex) {
            $aIndexInfo[$oIndex->getName()] = $oIndex->getColumns();
        }

        $this->view->index_informations = $aIndexInfo;

        $aCleEtrangere     = $this->db->describeReferences('utilisateurs');
        $aCleEtrangereInfo = [];

        foreach ($aCleEtrangere as $oCleEtrangere) {
            $aCleEtrangereInfo[$oCleEtrangere->getName()] = [
                'Base de données ciblée : ' . $oCleEtrangere->getReferencedSchema(),
                'Table ciblée : ' . $oCleEtrangere->getReferencedTable(),
                'Colonnes ciblées : ' . implode(',', $oCleEtrangere->getReferencedColumns()),
                'Colonnes de la table utilisateur : ' . implode(',', $oCleEtrangere->getColumns()),
            ];
        }

        $this->view->cle_etrangere_informations = $aCleEtrangereInfo;

        $aVues            = $this->db->listViews('public');
        $this->view->vues = $aVues;

        $bUtilisateursVueExiste                 = $this->db->viewExists('utilisateurs_crypte');
        $this->view->utilisateurs_crypte_existe = $bUtilisateursVueExiste;
    }
}

