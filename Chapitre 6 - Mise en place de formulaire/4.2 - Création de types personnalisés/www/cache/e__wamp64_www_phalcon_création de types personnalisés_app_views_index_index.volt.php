<h1>Mise en place de formulaire</h1>
<h2>Création de types personnalisés</h2>
<form method="post">
    <div class="form-group">
        <?= $form->label('poids') ?>
        <?= $form->render('poids') ?>
    </div>
    <div class="form-group">
        <?= $form->label('liste_pays') ?>
        <?= $form->render('liste_pays') ?>
    </div>
</form>