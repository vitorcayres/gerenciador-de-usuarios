<?php

// Routes

# Autenticação
$app->post('/auth', App\Controllers\Authentication::class);

# Usuários
$app->group('/v1', function () {
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/users[/{id:[0-9]+}]', App\Controllers\UsersController::class . ':execute');
});

# Empresas
$app->group('/v1', function () {
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/workplace[/{id:[0-9]+}]', App\Controllers\WorkplaceController::class . ':execute');
});