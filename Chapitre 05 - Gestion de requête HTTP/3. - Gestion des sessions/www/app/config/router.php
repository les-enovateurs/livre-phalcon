<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/utilisateur/session/simple', [
    'controller' => 'index',
    'action'     => 'utilisateurSessionSimple',
])->setName('utilisateur_session_simple');

$router->add('/utilisateur/session/verification', [
    'controller' => 'index',
    'action'     => 'utilisateurSessionVerification',
])->setName('utilisateur_session_verification');

$router->add('/utilisateur/session/suppression', [
    'controller' => 'index',
    'action'     => 'suppressionUtilisateurSession',
])->setName('suppression_utilisateur_session');

$router->add('/utilisateur/session/suppression/complet', [
    'controller' => 'index',
    'action'     => 'suppressionCompleteSession',
])->setName('suppression_session_complete');

$router->handle($_GET['_url'] ?? '/');
