<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/ping', function () {
    return response()->json(['ack' => time()]);
});

$router->post('/books', function () use ($router) {
    return "test";
});

$router->get('/books', function () use ($router) {
    return "test";
});
