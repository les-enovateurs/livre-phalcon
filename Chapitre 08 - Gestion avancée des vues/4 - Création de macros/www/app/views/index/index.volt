<h1>Création de macros</h1>
<h2>Génération de code HTML avec des paramètres</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

{# Macro de génération de liste avec lien #}
{%- macro generation_lien(elements_menu) %}
    <ul>
        {%- for element in elements_menu %}
            <li>
                <a href='{{ url(element['url']) }}' title='{{ element['nom']|striptags }}'>
                    {{ url(element['nom']) }}
                </a>
            </li>
        {%- endfor %}
    </ul>
{%- endmacro %}

{# Utilisation de la fonction #}
{{ generation_lien([['url' : 'https://les-enovateurs.com', 'nom' : 'Les Enovateurs'], 
['url' : 'https://www.graphivox.com' , 'nom' : 'Graphivox']]) }}

<h2>Génération de code HTML avec des paramètres nommés</h2>

{# Macro avec des paramètres nommés #}
{%- macro affiche_plante(nom, quantite, prix) %}
   <p>Nom : {{ nom }}</p>
   <p>Quantite : {{ quantite }}</p>
   <p>Prix : {{ prix }}</p>
{%- endmacro %}

{# Appel de la macro #}
{{ affiche_plante('prix': '30€', 'nom': 'Orchidée', 'quantite': 10) }}

<h2>Création de macro avec des paramètres par défaut</h2>
{%- macro bouton_enregistrement_defaut(name='Enregistrer') %}
    {% return submit_button(name, 'class': 'btn btn-warning') %}
{%- endmacro %}

{# Appel de la macro #}
<h3>Sans paramètre</h3>
{{ '<form>' ~ bouton_enregistrement_defaut() ~ '</form>' }}
<br/>
<h3>Avec paramètre</h3>
{{ '<form>' ~ bouton_enregistrement_defaut('Transmettre') ~ '</form>' }}

<br/>

<h2>Retour de données avec une macro</h2>
{%- macro bouton_enregistrement(name) %}
    {% return submit_button(name, 'class': 'btn btn-warning') %}
{%- endmacro %}

{# Appel de la macro #}
{{ '<form>' ~ bouton_enregistrement('Envoyer') ~ '</form>' }}


