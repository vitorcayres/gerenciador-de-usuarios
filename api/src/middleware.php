<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

/**
 * Auth básica HTTP
 */
$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "users" => ["root" => "toor"], // Usuários existentes
    "path" => ["/v1/auth/login"],    // Blacklist - Deixa todas liberadas e só protege as dentro do array
]));

/**
 * Auth básica do JWT
 * Whitelist - Bloqueia tudo, e só libera os
 * itens dentro do "passthrough"
 */
$app->add(new \Slim\Middleware\JwtAuthentication([
    "regexp" => "/(.*)/", //Regex para encontrar o Token nos Headers - Livre
    "header" => "Authorization", //O Header que vai conter o token
    "path" => "/", //Vamos cobrir toda a API a partir do /
    "passthrough" => ["/v1/auth/login", "/v1/teste"], //Vamos adicionar a exceção de cobertura a rota /auth
    "realm" => "Protected", 
    "secret" => $container['secretkey'] //Nosso secretkey criado 
]));

$app->add(new Psr7Middlewares\Middleware\TrailingSlash(false));