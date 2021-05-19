<?php
use Core\{Auth, AuthHome};
use Core\MotorView as View;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/', function () {
    View::view('HomeView', null);
})->add(new AuthHome());

$app->group('/areas', function () use ($app) {
	$app->get('', '\Controllers\AreasController:index');
});

$app->group('/usuarios', function () use ($app) {
	$app->get('', '\Controllers\UsersController:index');
	$app->post('', '\Controllers\UsersController:store');
	$app->delete('/{id}', '\Controllers\UsersController:destroy');
	$app->get('/crear', '\Controllers\UsersController:create');
})->add(new Auth());

$app->get('/history/login', '\Controllers\HistoryController:index')->add(new Auth());

$app->get('/admin', function () {
	View::view('AdminView', null);
})->add(new Auth());

$app->group('/login', function () use ($app) {
	$app->get('', '\Controllers\LoginController:out');
	$app->post('', '\Controllers\LoginController:login');
});


$app->run();