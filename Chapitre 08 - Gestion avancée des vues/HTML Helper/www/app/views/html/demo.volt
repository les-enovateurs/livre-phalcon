<h1>Utilisation des nouveaux composants HTML</h1>
<h2>Lien classique</h2>
    {{ lienClassique }}

<h2>Lien brute en conservant les balises HTML</h2>
    {{ lienBrute }}

<h2>Bouton</h2>
    {{ bouton }}

<h2>Image</h2>
    {{ image }}

<h2>Zone de texte</h2>
    {{ zone_texte }}

<h2>Formulaire</h2>
    {{ formulaire }}
    {{ fin_formulaire }}

<h2>Corps/Body</h2>
    {{ corps }}
    test
    {{ fin_corps }}

<h2>Libellé</h2>
    {{ libelle }}
    Nom :
    {{ fin_libelle }}

<h2>Citation en utilisant la classe Element</h2>
    {{ citation }}

<h2>Citation brute en conservant les balises HTML</h2>
    {{ citation_brute }}

<h2>Fil d'ariane</h2>
    {{ fil.render() }}

<h2>Lien créer avec la classe Factory</h2>
    {{ lienFabrique }}