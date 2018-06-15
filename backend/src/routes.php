<?php

// Routes

# Autenticação
$app->post('/auth', App\Controllers\Authentication::class);

# Usuários
$app->get('/users', App\Controllers\Authentication::class);
$app->get('/users/{id}', App\Controllers\Authentication::class);
$app->post('/users/{}', App\Controllers\Authentication::class);

// $app->post('/auth', function (Request $request, Response $response) use ($app) {

//     $key = $this->get("secretkey");
//     $token = array(
//         "user" => "@fidelissauro",
//         "twitter" => "https://twitter.com/fidelissauro",
//         "github" => "https://github.com/msfidelis"
//     );
//     $jwt = JWT::encode($token, $key);
//     return $response->withJson(["auth-jwt" => $jwt], 200)
//         ->withHeader('Content-type', 'application/json');   
// });