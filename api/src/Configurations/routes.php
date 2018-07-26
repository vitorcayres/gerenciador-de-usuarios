<?php

# Rotas
$app->group('/v1', function () {
	
	# Autenticação
	$this->post('/auth/login', App\Controllers\LoginController::class);

	# Usuários
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/users[/{id:[0-9]+}]', App\Controllers\UsersController::class . ':execute')
		->add(App\Middleware\Authentication::class);

	# Alterar Senha
	$this->map(['PUT'], '/change_password[/{id:[0-9]+}]', App\Controllers\UsersController::class . ':change_password')
		->add(App\Middleware\Authentication::class);		

	# Empresas
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/workplace[/{id:[0-9]+}]', App\Controllers\WorkplaceController::class .':execute')
		->add(App\Middleware\Authentication::class);

	# Permissões
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/permissions[/{id:[0-9]+}]', App\Controllers\PermissionsController::class . ':execute')
		->add(App\Middleware\Authentication::class);

	# Perfil
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/usergroup[/{id:[0-9]+}]', App\Controllers\UsergroupController::class . ':execute')
		->add(App\Middleware\Authentication::class);

	# Grupo de Permissões
	$this->map(['GET', 'POST', 'PUT', 'DELETE'], '/usergroup_has_permission[/{id:[0-9]+}]', App\Controllers\UsergroupHasPermissionController::class . ':execute')
		->add(App\Middleware\Authentication::class);		

});