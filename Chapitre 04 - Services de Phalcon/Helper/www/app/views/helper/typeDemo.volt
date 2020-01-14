<h1>Des classes Helper par type de variable</h1>
<h2>Utilisation de Phalcon\Helper\Number</h2>

<h3>Vérification d'intervalle</h3>
<h4>Positif</h4>
<code>
    Number::between(10, 5, 20);
</code>
<p>{{ intervalle_vrai }}</p>

<h4>Négatif</h4>
<code>
    Number::between(4, 5, 20);
</code>
<p>{{ intervalle_faux|default(0) }}</p>

<h2>Utilisation de Phalcon\Helper\Str</h2>
<h3>Camelisé</h3>
<h4>Simple avec tiret</h4>
<code>
    Str::camelize('unlock_my_data');
</code>
<p>{{ transforme_camelcase_tiret }}</p>
<h4>Simple avec différents délimiteurs</h4>
<code>
    Str::camelize('unlock-my_data', '-_');
</code>
<p>{{ transforme_camelcase_multi_delimiteur }}</p>

<h3>DéCamelisé</h3>
<h4>Simple avec tiret</h4>
<code>
    Str::uncamelize('Unlock My Data');
</code>
<p>{{ transforme_uncamelcase_tiret }}</p>
<h4>Simple avec un délimiteur</h4>
<code>
    Str::uncamelize('Unlock My Data','-');
</code>
<p>{{ transforme_uncamelcase_delimiteur }}</p>

<h3>Tiret du bas</h3>
<p>{{ tiret_du_bas }}</p>

<h3>Concatenation</h3>
<small>Le premier paramètre correspond au séparateur.</small><br />
<code>
    Str::concat('/','/var','www','html','les_enovateurs');
</code>
<p>{{ concatenation }}</p>

<h3>Nombre de voyelle</h3>
<code>
    Str::countVowels('les enovateurs');
</code>
<p>{{ nombre_voyelles }}</p>

<h3>Decapitalise</h3>
<h4>Classique</h4>
<code>
    Str::decapitalize('Les Enovateurs');  
</code>
<p>{{ decapitalise }}</p>
<h4>Inversement</h4>
<code>
    Str::decapitalize('Les Enovateurs', true);
</code>
<p>{{ decapitalise_inversement }}</p>

<h3>Incrément</h3>
<h4>A partir du niveau zero</h4>
<code>
    Str::increment('version');
</code>
<p>{{ increment }}</p>

<h4>A partir du niveau 1</h4>
<code>
    Str::increment('version_1');
</code>
<p>{{ increment_niveau_1 }}</p>

<h4>Avec séparateur</h4>
<code>
    Str::increment('version','.');
</code>
<p>{{ increment_avec_separateur }}</p>

<h3>Décrément</h3>
<h4>A partir du niveau zero</h4>
<code>
    Str::decrement('version_1');
</code>
<p>{{ decrement }}</p>

<h4>A partir du niveau 1</h4>
<code>
    Str::decrement('version_2');
</code>
<p>{{ decrement_niveau_2 }}</p>

<h4>Avec séparateur</h4>
<code>
    Str::decrement('version.2','.');
</code>
<p>{{ decrement_avec_separateur }}</p>

<h3>Gestion de dossier</h3>
<h4>Génération d'une structure de dossier à partir du nom d'un fichier</h4>
<code>
    Str::dirFromFile("photo_profil.jpg");
</code>
<p>{{ generation_dossier }}</p>

<h4>Modification/validation d'un chemin de dossier</h4>
<code>
    Str::dirSeparator("/var/www/html/site");
</code>
<p>{{ valide_chemin_dossier }}</p>

<h3>Composition de phrase aléatoire en se basant sur des termes définit.</h3>
<code>
    Str::dynamic('{Jeremy|Franck|Sébastien|Camille} - {Les Enovateurs|Graphivox|Unlock My Data} - {Entreprise|Société}');
</code>
<p>{{ phrase_aleatoire }}</p>

<h3>Composition de phrase aléatoire avec un séparateur définit</h3>
<code>
    Str::dynamic('Identité : [Jeremy#Franck#Sébastien#Camille] - Désignation : [Les Enovateurs#Graphivox#Unlock My Data] - Type :  [Entreprise#Société]','[',']','#');
</code>
<p>{{ phrase_aleatoire_separateur }}</p>

<h3>Génération de caractères aléatoires</h3>
<code>
    Str::random(Str::RANDOM_ALNUM);
</code>
<p>{{ termes_aleatoires }}</p>

<h4>En spécifiant la taille</h4>
<code>
    Str::random(Str::RANDOM_ALNUM, 10);
</code>
<p>{{ aleatoire_10 }}</p>

<h3>Vérification des caractères en début de texte</h3>
<h4>Classique</h4>
<code>
    Str::startsWith('profil_0_jeremy', 'profil_');
</code>
<p>{{ validation_debut_caracteres }}</p>
<h4>Insensible</h4>
<code>
    Str::startsWith('profil_1_didier', 'PROFIL_');
</code>
<p>{{ validation_debut_caracteres_insensible }}</p>
<h4>Sensible aux majuscules/minuscules</h4>
<code>
    Str::startsWith('profil_2_virginia', 'PROFIL_', false);
</code>
<p>{{ validation_debut_caracteres_sensible|default(0) }}</p>

<h3>Vérification des caractères en fin de texte</h3>
<h4>Classique</h4>
<code>
    Str::endsWith('avatar_0.jpg', 'jpg');
</code>
<p>{{ validation_fin_caracteres }}</p>
<h4>Insensible</h4>
<code>
    Str::endsWith('profil_0.jpg', 'JPG');
</code>
<p>{{ validation_fin_caracteres_insensible }}</p>
<h4>Sensible aux majuscules/minuscules</h4>
<code>
    Str::endsWith('photo_1.jpg', 'JPG', false);
</code>
<p>{{ validation_fin_caracteres_sensible|default(0) }}</p>

<h3>Vérification de la présence d'un mot/expression dans une chaîne de caractères</h3>
<h4>Positif</h4>
<code>
    Str::includes('photo', 'une photo de Jeremy');
</code>
<p>{{ present_vrai }}</p>
<h4>Négatif</h4>
<code>
    Str::includes('photo', 'une image de Jeremy');
</code>
<p>{{ present_faux|default(0) }}</p>

<h3>Vérifie si la chaîne de caractères est en majuscules</h3>
<code>
    Str::isUpper('GARANTIES');
</code>
<p>{{ en_majuscules }}</p>

<h3>Vérifie si la chaîne de caractères est en minuscules</h3>
<code>
    Str::isLower('garanties');
</code>
<p>{{ en_minuscules }}</p>

<h3>Vérifie si deux chaînes sont des anagrammes</h3>
<h4>Positif</h4>
<code>
    Str::isAnagram('imaginer', 'migraine');
</code>
<p>{{ anagramme }}</p>

<h4>Négatif</h4>
<code>
    Str::isAnagram('imaginer', 'etoile');
</code>
<p>{{ anagramme_faux|default(0) }}</p>

<h3>Vérifie si la chaîne de caractère est un palindrome</h3>
<code>
    Str::isPalindrome('kayak');
</code>
<p>{{ palindrome }}</p>

<h3>Récupération de la dernière occurence entouré de deux caractères</h3>
<code>
    Str::firstBetween('Bonjour [nom], vous venez de recevoir [objet]', '[',']');
</code>
<p>{{ premiere_occurence_entoure }}</p>

<h3>Remplace les _ et les - par des espaces pour rendre le texte plus lisible</h3>
<code>
    Str::humanize('profil_utilisateur-jeremy');
</code>
<p>{{ plus_lisible }}</p>

<h3>Transformation</h3>
<h4>En minuscules</h4>
<code>
    Str::lower('LIVRE PHALCON');
</code>
<p>{{ minuscules }}</p>

<h4>En majuscules</h4>
<code>
    Str::upper('livre de Jeremy');
</code>
<p>{{ majuscules }}</p>

<h3>Suppression la présences multiples de slash / à l'exception de schéma connu comme https:// ftps://</h3>
<h4>Simple</h4>
<code>
    Str::reduceSlashes('//enovateurs.com///raspberry/pi');
</code>
<p>{{ suppression_slash }}</p>
<h4>Avec schéma HTTPS</h4>
<code>
    Str::reduceSlashes('https://enovateurs.com///docker/image');
</code>
<p>{{ suppression_slash_schema }}</p>