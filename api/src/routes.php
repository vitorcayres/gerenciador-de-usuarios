<?php

// Routes

# Autenticação
$app->post('/auth', App\Controllers\Authentication::class);

# Usuários
$app->get('/users',                App\Controllers\UsersController::class . ':list');
$app->get('/users/{id:[0-9]+}',    App\Controllers\UsersController::class . ':listById');
$app->post('/users',               App\Controllers\UsersController::class . ':add');
$app->put('/users/{id:[0-9]+}',    App\Controllers\UsersController::class . ':edit');
$app->delete('/users/{id:[0-9]+}', App\Controllers\UsersController::class . ':remove');