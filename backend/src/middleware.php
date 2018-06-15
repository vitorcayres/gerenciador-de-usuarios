<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

/**
 * Auth básica HTTP
 */
$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "users" => ["root" => "toor"], // Usuários existentes
    "path" => ["/auth"],    // Blacklist - Deixa todas liberadas e só protege as dentro do array
    //"passthrough" => ["/auth/liberada", "/admin/ping"], //     Whitelist - Protege todas as rotas e só libera as de dentro do array
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
    "passthrough" => ["/auth"], //Vamos adicionar a exceção de cobertura a rota /auth
    "realm" => "Protected", 
    "secret" => $container['secretkey'] //Nosso secretkey criado 
]));

$app->add(new Psr7Middlewares\Middleware\TrailingSlash(false));