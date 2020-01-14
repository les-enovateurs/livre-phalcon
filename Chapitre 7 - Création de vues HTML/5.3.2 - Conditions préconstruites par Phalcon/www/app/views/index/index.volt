<h1>Utilisations de conditions</h1>
<h2>Conditions préconstruites par Phalcon</h2>
<p>Voir le fichier app/views/index/index.volt</p><br />

<h3>Utilisation de <code>defined</code></h3>
{% set utilisateur = {} %}

{% if utilisateur is defined %}
    <p>La variable utilisateur existe</p>
{% else %}
    <p>La variable utilisateur n'existe pas</p>
{% endif %}

<h3>Utilisation de <code>empty</code></h3>
{% set nPanier = 0 %}
{% if nPanier is empty %}
    <p>Le panier est vide</p>
{% else %}
    <p>Le panier n’est pas vide</p>
{% endif %}

<h3>Utilisation de <code>type</code></h3>
{% set sNom = 'Fabrice' %}

{% if sNom is type('string') %}
    <p>La variable sNom est du type chaîne de caractères.</p>
{% else %}
    <p>La variable sNom n'est pas du type chaîne de caractères.</p>
{% endif %}

<h3>Utilisation d'<code>iterable</code></h3>
{% set aArticles = [ 'raspberry_pi', 'openvpn', 'raspbian' ] %}

{% if aArticles is iterable %}
    <p>La variable aArticles est itérable.</p>
{% else %}
    <p>La variable aArticles n'est pas itérable.</p>
{% endif %}

<h3>Utilisation de <code>numeric</code></h3>
{% set nPoids = 82 %}

{% if nPoids is numeric %}
    <p>La variable nPoids est numérique.</p>
{% else %}
    <p>La variable nPoids n'est pas numérique.</p>
{% endif %}

<h3>Utilisation de <code>sameas</code></h3>
{% set sPays = 'France' %}

{% if sPays is sameas('France') %}
    <p>Le pays est bien français.</p>
{% else %}
    <p>Le pays n'est pas français.</p>
{% endif %}

{% set nRatio = 350 %}

<h3>Utilisation de <code>divisibleby</code></h3>
{% if nRatio is divisibleby(10) %}
    <p>La variable nRatio est divisible par 10.</p>
{% else %}
    <p>La variable nRatio n'est pas divisible par 10.</p>
{% endif %}

<h3>Utilisation de <code>even</code></h3>
{% set nNumero = 2 %}

{% if nNumero is even %}
    <p>La variable nNumero est paire.</p>
{% else %}
    <p>La variable nNumero est impaire.</p>
{% endif %}

<h3>Utilisation de <code>odd</code></h3>
{% set nNumeroImpaire = 3 %}

{% if nNumeroImpaire is odd %}
    <p>La variable nNumeroImpaire est impaire.</p>
{% else %}
    <p>La variable nNumeroImpaire est paire.</p>
{% endif %}
