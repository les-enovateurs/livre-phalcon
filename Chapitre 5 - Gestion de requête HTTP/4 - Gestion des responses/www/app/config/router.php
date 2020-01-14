<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/page/404',[
    'controller' => 'index',
    'action'     => 'page404',
])->setName('page_404');

$router->add('/contenu/json',[
    'controller' => 'index',
    'action'     => 'contenuJSON',
])->setName('contenu_json');

$router->add('/contenu/fichier',[
    'controller' => 'index',
    'action'     => 'contenuFichier',
])->setName('contenu_fichier');

$router->add('/modification/entete',[
    'controller' => 'index',
    'action'     => 'modificationEntete',
])->setName('modification_entete');

$router->add('/requete/cache/identifiant',[
    'controller' => 'index',
    'action'     => 'requeteCacheIdentifiant',
])->setName('requete_cache_identifiant');

$router->add('/requete/cache/temps/expiration',[
    'controller' => 'index',
    'action'     => 'requeteCacheTempsExpiration',
])->setName('requete_cache_temps_expiration');

$router->add('/requete/cache/date/expiration',[
    'controller' => 'index',
    'action'     => 'requeteCacheDateExpiration',
])->setName('requete_cache_date_expiration');

$router->add('/requete/cache/date/precise/expiration',[
    'controller' => 'index',
    'action'     => 'requeteCacheDatePreciseExpiration',
])->setName('requete_cache_date_precise_expiration');

$router->add('/requete/redirection/url/interne',[
    'controller' => 'index',
    'action'     => 'requeteRedirectionUrlInterne',
])->setName('requete_redirection_url_interne');

$router->add('/requete/redirection/nom/route',[
    'controller' => 'index',
    'action'     => 'requeteRedirectionNomRoute',
])->setName('requete_redirection_nom_route');

$router->add('/requete/redirection/url/externe',[
    'controller' => 'index',
    'action'     => 'requeteRedirectionUrlExterne',
])->setName('requete_redirection_url_externe');

$router->add('/bonjour/nom/{nom}',[
    'controller' => 'index',
    'action'     => 'bonjourNom',
])->setName('bonjour_nom');

$router->handle();
