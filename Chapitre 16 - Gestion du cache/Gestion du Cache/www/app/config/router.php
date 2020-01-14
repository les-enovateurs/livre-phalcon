<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/utilisateur/cache/simple', [
    'controller' => 'index',
    'action'     => 'utilisateurCacheSimple',
])->setName('utilisateur_cache_simple');

$router->add('/utilisateur/cache/expiration', [
    'controller' => 'index',
    'action'     => 'utilisateurCacheExpiration',
])->setName('utilisateur_cache_expiration');

$router->add('/utilisateur/cache/expiration/sauvegarde', [
    'controller' => 'index',
    'action'     => 'utilisateurCacheExpirationSauvegarde',
])->setName('utilisateur_cache_expiration_sauvegarde');

$router->add('/liste/element/cache', [
    'controller' => 'index',
    'action'     => 'listeElementCache',
])->setName('liste_element_cache');

$router->add('/recherche/cle/cache', [
    'controller' => 'index',
    'action'     => 'rechercheCleCache',
])->setName('recherche_cle_cache');

$router->add('/suppression/cache', [
    'controller' => 'index',
    'action'     => 'suppressionCache',
])->setName('suppression_cache');

$router->add('/suppression/tout/cache', [
    'controller' => 'index',
    'action'     => 'suppressionToutCache',
])->setName('suppression_tout_cache');

$router->handle();
