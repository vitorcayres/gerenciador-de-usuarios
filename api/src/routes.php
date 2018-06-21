<?php

// Routes

# Autenticação
$app->group('/v1', function () {
	$this->post('/auth/login', App\Controllers\AuthenticationController::class);
});

# Usuários
$app->group('/v1', function () {
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/users[/{id:[0-9]+}]', App\Controllers\UsersController::class . ':execute');
});

# Empresas
$app->group('/v1', function () {
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/workplace[/{id:[0-9]+}]', App\Controllers\WorkplaceController::class . ':execute');
});

# Permissões
$app->group('/v1', function () {
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/permissions[/{id:[0-9]+}]', App\Controllers\PermissionsController::class . ':execute');
});

# Perfil
$app->group('/v1', function () {
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/usergroup[/{id:[0-9]+}]', App\Controllers\UsergroupController::class . ':execute');
});