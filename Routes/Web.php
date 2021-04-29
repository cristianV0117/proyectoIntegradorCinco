<?php
use Core\MotorView as View;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/', function () {
    View::view('HomeView', null);
});

$app->group('/areas', function () use ($app) {
	$app->get('', '\Controllers\AreasController:index');
});

$app->group('/usuarios', function () use ($app) {
	$app->get('', '\Controllers\UsersController:index');
});

$app->get('/admin', function () {
	View::view('AdminView', null);
});

$app->post('/login', '\Controllers\LoginController:login');

$app->run();