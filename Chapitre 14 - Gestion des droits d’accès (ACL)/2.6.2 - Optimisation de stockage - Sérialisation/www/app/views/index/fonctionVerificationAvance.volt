<h1>Gestion des droits d'accès (ACL)</h1>
<h2>Fonction de vérification avancée</h2>
<h3>Règles</h3>
<code>$oAclExemple->allow(
        'membre',
        'groupe',
        'ajouter',
        function ($sTypeCompte, $sActif) {
            if('Premium' === $sTypeCompte && true === $sActif){
                return true;
            }

            return false;
        }
    );</code>
<h3>Cas 1 </h3>
<code>$oAclExemple->isAllowed(
        'membre',
        'groupe',
        'ajouter',
        [
            'sTypeCompte'   => 'Premium',
            'sActif'        => true
        ]
    );</code>
<p>Acces 1 : 
    {% if acces is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>

<h3>Cas 2 </h3>
<code>$oAclExemple->isAllowed(
        'membre',
        'groupe',
        'ajouter',
        [
            'sTypeCompte' => 'Classique',
            'sActif'      => true
        ]
    );</code>
<p>Acces 2 :     
    {% if acces2 is true %}
        Autorisé
    {% else %}
        Non Autorisé
    {% endif %}
</p>