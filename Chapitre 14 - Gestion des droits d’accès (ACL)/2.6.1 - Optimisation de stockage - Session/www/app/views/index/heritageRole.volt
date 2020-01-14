<h1>Gestion des droits d'accès (ACL)</h1>
<h2>Héritage de rôle - Par ajout de rôle</h2>
<h3>Règles</h3>
<code>
    $oAclExemple->addRole($oRoleMembre, 'invite');
    $oAclExemple->allow(
    'invite',
    'groupe',
    'liste'
    );

    $oAclExemple->allow(
    'membre',
    'groupe',
    'ajouter'
    );

</code>
<h3>Cas 1 </h3>
<code>$oAclExemple->isAllowed(
    'membre',
    'groupe',
    'liste'
    );</code>
<p>Acces 1 :
    {% if membre_liste_groupe is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>

<h3>Cas 2 </h3>
<code>$oAclExemple->isAllowed(
    'invite',
    'groupe',
    'liste'
    );</code>
<p>Acces 2 :
    {% if invite_liste_groupe is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>
<h3>Cas 3 </h3>
<code>$oAclExemple->isAllowed(
    'membre',
    'groupe',
    'ajouter'
    );</code>
<p>Acces 1 :
    {% if membre_ajouter_groupe is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>

<h3>Cas 4 </h3>
<code>$oAclExemple->isAllowed(
    'invite',
    'groupe',
    'ajouter'
    );</code>
<p>Acces 2 :
    {% if invite_ajouter_groupe is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>
<h2>Héritage de rôle - Avec la fonction addInherit</h2>
<h3>Règles</h3>
<code>
    $oAclExemple->addInherit('administrateur', 'stagiaire');
    $oAclExemple->allow(
    'stagiaire',
    'dossier',
    'liste'
    );

    $oAclExemple->allow(
    'administrateur',
    'dossier',
    'ajouter'
    );
</code>
<h3>Cas 1 </h3>
<code>
    $oAclExemple->isAllowed(
    'administrateur',
    'dossier',
    'liste'
    );
</code>
<p>Acces 1 :
    {% if administrateur_liste_dossier is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>

<h3>Cas 2 </h3>
<code>
    $oAclExemple->isAllowed(
    'stagiaire',
    'dossier',
    'liste'
    );
</code>
<p>Acces 2 :
    {% if stagiaire_liste_dossier is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>
<h3>Cas 3 </h3>
<code>
    $oAclExemple->isAllowed(
    'administrateur',
    'dossier',
    'ajouter'
    );
</code>
<p>Acces 1 :
    {% if administrateur_ajouter_dossier is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>

<h3>Cas 4 </h3>
<code>
    $oAclExemple->isAllowed(
    'stagiaire',
    'dossier',
    'ajouter'
    );
</code>
<p>Acces 2 :
    {% if stagiaire_ajouter_dossier is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>
