<?php

use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\View;
use HelloWorld\Models\Utilisateurs;

use \Phalcon\Db\Column;

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
        $oColumnInformations = new ReflectionClass ('\Phalcon\Db\Column');
        $aConstantes         = $oColumnInformations->getConstants();

        foreach ($aConstantes as $sNom => $sValeur) {
            if (false !== strpos($sNom, $sPrefix) && $sValeur === $nType) {
                return $sNom;
            }
        }
    }

    public function creationTableAction()
    {

        $aColonnes = [];

        $aColonnes[] = new Column('id', [
            "type"          => Column::TYPE_BIGINTEGER,
            "notNull"       => true,
            "autoIncrement" => true,
            "first"         => true,
            "primary"       => true,
            "isNumeric"     => true,
            "bind"          => Column::BIND_PARAM_INT
        ]);

        $aColonnes[] = new Column('nom', [
            "type"      => Column::TYPE_VARCHAR,
            "size"      => 10,
            "notNull"   => true,
            "default"   => 'livre_',
            "isNumeric" => false,
            "after"     => 'id',
            "bind"      => Column::BIND_PARAM_STR
        ]);

        $aColonnes[] = new Column('prix', [
            "type"      => Column::TYPE_DECIMAL,
            "size"      => 4,
            "notNull"   => true,
            "scale"     => 2,
            "default"   => 10,
            "isNumeric" => true,
            "after"     => 'nom',
            "bind"      => Column::BIND_PARAM_DECIMAL
        ]);

        $aColonnes[] = new Column('quantite', [
            "type"      => Column::TYPE_INTEGER,
            "size"      => 4,
            "notNull"   => true,
            "default"   => 10,
            "isNumeric" => true,
            "after"     => 'prix',
            "bind"      => Column::BIND_PARAM_INT
        ]);

        $aColonnes[] = new Column('proprietaire_utilisateur_id', [
            "type"      => Column::TYPE_BIGINTEGER,
            "notNull"   => true,
            "isNumeric" => true,
            "bind"      => Column::BIND_PARAM_INT
        ]);

        $aIndex   = [];
        $aIndex[] = new Index('nom_prix_unique', [ 'nom', 'prix' ], 'unique');

        $aReferences   = [];
        $aReferences[] = new Reference('utilisateur_id_fk', [
            'referencedSchema'  => 'phalcon',
            'referencedTable'   => 'utilisateurs',
            'columns'           => [
                'proprietaire_utilisateur_id'
            ],
            'referencedColumns' => [
                'id'
            ]
        ]);

        $this->db->createTable(
            'livres',
            'public',
            [
                'columns'    => $aColonnes,
                'indexes'    => $aIndex,
                'references' => $aReferences,
            ]
        );

        $bLivresExiste = $this->db->tableExists('livres');

        $aColonnesLivres = $this->db->describeColumns('livres');

        $this->view->livres_existe = $bLivresExiste;

        $aColonnesInfo = [];

        foreach ($aColonnesLivres as $oColonne) {

            $aColonnesInfo[$oColonne->getName()] = [
                'Placé après la colonne : ' . $oColonne->getAfterPosition(),
                'Valeur par défaut : ' . $oColonne->getDefault(),
                'Type : Brute(' . $oColonne->getType() . ') - ' . $this->typeColonne($oColonne->getType(), 'TYPE_'),
                'Type construit PHP : Brute(' . $oColonne->getBindType() . ') - ' . $this->typeColonne($oColonne->getBindType(), 'BIND_'),
                'Nombre de décimales après la virgule : ' . $oColonne->getScale(),
                'Taille maximum du contenu du champ : ' . $oColonne->getSize(),
                'Est la première colonne : ' . $oColonne->isFirst(),
                'Est en auto-incrémentation : ' . $oColonne->isAutoIncrement(),
                'Contient obligatoirement une valeur : ' . $oColonne->isNotNull(),
                'Est numérique : ' . $oColonne->isNumeric(),
                'Est positif : ' . $oColonne->isUnsigned(),
            ];

        }

        $this->view->colonnes_informations = $aColonnesInfo;

        $aIndex     = $this->db->describeIndexes('livres');
        $aIndexInfo = [];

        foreach ($aIndex as $oIndex) {
            $aIndexInfo[$oIndex->getName()] = $oIndex->getColumns();
        }

        $this->view->index_informations = $aIndexInfo;

        $aCleEtrangere     = $this->db->describeReferences('livres');
        $aCleEtrangereInfo = [];

        foreach ($aCleEtrangere as $oCleEtrangere) {
            $aCleEtrangereInfo[$oCleEtrangere->getName()] = [
                'Base de données cible : ' . $oCleEtrangere->getReferencedSchema(),
                'Table cible : ' . $oCleEtrangere->getReferencedTable(),
                'Colonnes cibles : ' . implode(',', $oCleEtrangere->getReferencedColumns()),
                'Colonnes de la table utilisateur : ' . implode(',', $oCleEtrangere->getColumns()),
            ];
        }

        $this->view->cle_etrangere_informations = $aCleEtrangereInfo;
    }

    public function ajoutColonneAction()
    {
        $this->db->addColumn(
            'utilisateurs',
            'public',
            new Column(
                'date_creation',
                [
                    'type' => Column::TYPE_DATE
                ]
            )
        );
        $aColonnes = $this->db->describeColumns('utilisateurs');

        $aColonnesInfo = [];

        foreach ($aColonnes as $oColonne) {

            $aColonnesInfo[$oColonne->getName()] = [
                'Placé après la colonne : ' . $oColonne->getAfterPosition(),
                'Valeur par défaut : ' . $oColonne->getDefault(),
                'Type : Brute(' . $oColonne->getType() . ') - ' . $this->typeColonne($oColonne->getType(), 'TYPE_'),
                'Type construit PHP : Brute(' . $oColonne->getBindType() . ') - ' . $this->typeColonne($oColonne->getBindType(), 'BIND_'),
                'Nombre de décimales après la virgule : ' . $oColonne->getScale(),
                'Taille maximum du contenu du champ : ' . $oColonne->getSize(),
                'Est la première colonne : ' . $oColonne->isFirst(),
                'Est en auto-incrémentation : ' . $oColonne->isAutoIncrement(),
                'Contient obligatoirement une valeur : ' . $oColonne->isNotNull(),
                'Est numérique : ' . $oColonne->isNumeric(),
                'Est positif : ' . $oColonne->isUnsigned(),
            ];

        }

        $this->view->colonnes_informations = $aColonnesInfo;
    }

    public function suppressionColonneAction()
    {
        $this->db->dropColumn(
            'utilisateurs',
            'public',
            'mot_de_passe'
        );
        $aColonnes = $this->db->describeColumns('utilisateurs');

        $aColonnesInfo = [];

        foreach ($aColonnes as $oColonne) {

            $aColonnesInfo[$oColonne->getName()] = [
                'Placé après la colonne : ' . $oColonne->getAfterPosition(),
                'Valeur par défaut : ' . $oColonne->getDefault(),
                'Type : Brute(' . $oColonne->getType() . ') - ' . $this->typeColonne($oColonne->getType(), 'TYPE_'),
                'Type construit PHP : Brute(' . $oColonne->getBindType() . ') - ' . $this->typeColonne($oColonne->getBindType(), 'BIND_'),
                'Nombre de décimales après la virgule : ' . $oColonne->getScale(),
                'Taille maximum du contenu du champ : ' . $oColonne->getSize(),
                'Est la première colonne : ' . $oColonne->isFirst(),
                'Est en auto-incrémentation : ' . $oColonne->isAutoIncrement(),
                'Contient obligatoirement une valeur : ' . $oColonne->isNotNull(),
                'Est numérique : ' . $oColonne->isNumeric(),
                'Est positif : ' . $oColonne->isUnsigned(),
            ];

        }

        $this->view->colonnes_informations = $aColonnesInfo;
    }

    public function suppressionTableAction(){
        $this->view->liste_table_avant = $this->db->listTables('public');

        $this->db->dropTable('livres', 'public');

        $this->view->liste_table_apres = $this->db->listTables('public');
    }
}

