<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('authors', 'AuthorController@index');
$router->post('authors', 'AuthorController@store');
$router->get('authors/{author}', 'AuthorController@show');
$router->put('authors/{author}', 'AuthorController@update');
$router->patch('authors/{author}', 'AuthorController@update');
$router->delete('authors/{author}', 'AuthorController@destroy');
