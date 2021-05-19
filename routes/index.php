<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Core\App;
use App\Src\Actions\User\IndexUserAction;

require_once __DIR__."/../vendor/autoload.php";

$app = new App();

$app->router->get('/', function() {
    return 'This is Home Page';
});
$app->router->get('/user/{id}', IndexUserAction::class);
$app->router->get('/user', function() {
    return 'This is User Page';
});


$app->run();