<h1>Utilisation des tags HTML</h1>
<h2>Génération du Doctype</h2>
<p>Voir le fichier app/views/index.volt</p>

<h2>Génération du titre (title)</h2>
<p>Voir le fichier app/views/index.volt</p>

<h2>Déclaration de style CSS</h2>
<p>Voir le fichier app/views/index.volt</p>

<h2>Déclaration de style Javascript</h2>
<p>Voir le fichier app/views/index.volt</p>

<p>Pour le reste, il faut voir le fichier app/views/index/index.volt</p><br />

<h2>Génération d'une image</h2>
<h4>Volt</h4>
{{ image('img/logo.jpg') }}
<h4>PHTML</h4>
<?php echo $this->tag->image(
    [
        'img/logo.jpg',
        'alt'   => 'le logo',
        'width' => '400px'
    ]
);
?>

<h2>Génération de lien hypertexte</h2>
<h3>Avec un lien simple</h3>
<h4>Volt</h4>
{{ link_to('dossier/utilisateur', 'Liste de dossier utilisateur') }}
<br />
<h4>PHTML</h4>
<?php echo $this->tag->linkTo('dossier/utilisateur', 'Liste de dossier utilisateur') ?>

<h3>Avec le nom de route</h3>
<h4>Volt</h4>
{{ link_to(['for': 'dossier_utilisateur', 'id': 8], 'Liste de dossier utilisateur') }}
<br />
<h4>PHTML</h4>
<?php echo $this->tag->linkTo([['for' => 'dossier_utilisateur', 'id' => 8], 'Liste de dossier utilisateur']) ?>

<h3>Avec le nom de la route et des paramètres HTML</h3>
<h4>Volt</h4>
{{ link_to(['for': 'dossier_utilisateur', 'id': 8], 'Liste de dossier utilisateur', 'class': 'btn btn-primary') }}
<br />
<h4>PHTML</h4>
<?php echo $this->tag->linkTo(['dossier/utilisateur', 'Liste de dossier utilisateur', 'class' => 'btn btn-primary', 'title' => 'Liste de dossiers']) ?>

<h2>Création d'un formulaire - En Volt</h2>
{{ form('inscription', 'method': 'post') }}

    <h3>Création d'un champ texte</h3>
        <label for="prenom">Prénom :</label>
        {{ text_field('prenom') }}

    <h3>Création d'un mot de passe</h3>
        <label for="mot_de_passe">Mot de passe :</label>
        {{ password_field('mot_de_passe') }}

    <h3>Création d'une zone de texte</h3>
        <label for="remarque">Remarque :</label>
        {{ text_area('remarque', 'Exemple de remarque', 'cols': 30, 'rows': 10) }}

    <h3>Création d'un champ caché</h3>
        {{ hidden_field('entreprise_id', 'value': 10) }}       

    <h3>Génération de liste static</h3>
        {{ selectStatic(
                'pays_id',
                [
                    '1' : 'France',
                    '2' : 'Italie'
                ]
            ) 
        }}

    <h3>Génération de liste dynamique</h3>
        {{ select(
            'utilisateurs_id',
            utilisateurs,
            'using': ['id', 'prenom'],
            'useEmpty': true,
            'emptyText': 'Choisissez un utilisateur', 
            'emptyValue': '@'
            ) 
        }}

    <h3>Utilisation de champs HTML</h3>
        <label for="nom">Nom :</label>
        {{ text_field('nom', 'required':'required', 'placeholder':'Saisir un nom', 'size':'20', 'maxlength':'50') }}

    
    <h3>Création d'un bouton de validation</h3>
        {{ submit_button('Enregistrer') }}
    

{{ endForm() }}

<h2>Création d'un formulaire - en PHTML</h2>
<?php echo $this->tag->form(['inscription', 'method' => 'post']); ?>
    <h3>Création d'un champ texte</h3>
        <label for="prenom">Prénom :</label>
        <?php echo $this->tag->textField('prenom'); ?>

    <h3>Création d'un mot de passe</h3>
        <label for="mot_de_passe">Mot de passe :</label>
        <?php echo $this->tag->passwordField(
                [
                'password',
                'size' => 10
                ]
            )
        ?>

    <h3>Création d'une zone de texte</h3>
        <label for="remarque">Remarque :</label>
        <?php echo $this->tag->textArea(
                [
                    'remarque',
                    'cols' => 30,
                    'rows' => 10,
                ]
            )
        ?>

    <h3>Création d'un champ caché</h3>
    <?php echo $this->tag->hiddenField(
            [
            'entreprise_id',
            'value' => 10,
            ]
        )
    ?>

    <h3>Génération de liste static</h3>
    <?php echo $this->tag->selectStatic(
            [
                'pays_id',
                [
                    '1' => 'France',
                    '2' => 'Italie'
                ]
            ]
        );
    ?>

    <h3>Génération de liste dynamique</h3>
        <?php
            echo $this->tag->select(
                [
                    'utilisateurs_id',
                    $utilisateurs,
                    'using' => [
                        'id',
                        'prenom',
                    ],
                    'useEmpty' => true,
                    'emptyText' => 'Choisissez un utilisateur',
                    'emptyValue'=> '@'
                ]
            );
        ?>

    <h3>Utilisation de champs HTML</h3>
        <label for="nom">Nom :</label>
        <?php echo $this->tag->textField(
                 [
                    'nom',
                    'required'    => 'required',
                    'placeholder' => 'Saisir un nom',
                    'size'        => 20,
                    'maxlength'   => 50
                 ]
            )
        ?>

    <h3>Création d'un bouton de validation</h3>
    <?php echo $this->tag->submitButton('Enregistrer'); ?>

<?php $this->tag->endForm() ?>