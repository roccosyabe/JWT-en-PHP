<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

require_once 'includes/config.php';
require_once 'classes/JWT.php';

// On crée le header
$header = [
    'typ' => 'JWT',
    'alg' => 'HS256'
];

// On crée le contenu (payload)
$payload = [
    'user_id' => 123,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_USER'
    ],
    'email' => 'contact@demo.fr'
];

$jwt = new JWT();

$token = $jwt->generate($header, $payload, SECRET);

// echo $token;

echo json_encode($payload);