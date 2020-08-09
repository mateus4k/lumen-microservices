<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     * Router for authors
     */
    $router->get('authors', 'AuthorController@index');
    $router->post('authors', 'AuthorController@store');
    $router->get('authors/{author}', 'AuthorController@show');
    $router->put('authors/{author}', 'AuthorController@update');
    $router->patch('authors/{author}', 'AuthorController@update');
    $router->delete('authors/{author}', 'AuthorController@destroy');

    /**
     * Router for books
     */
    $router->get('books', 'BookController@index');
    $router->post('books', 'BookController@store');
    $router->get('books/{book}', 'BookController@show');
    $router->put('books/{book}', 'BookController@update');
    $router->patch('books/{book}', 'BookController@update');
    $router->delete('books/{book}', 'BookController@destroy');

    /**
     * Router for users
     */
    $router->get('users', 'UserController@index');
    $router->post('users', 'UserController@store');
    $router->get('users/{user}', 'UserController@show');
    $router->put('users/{user}', 'UserController@update');
    $router->patch('users/{user}', 'UserController@update');
    $router->delete('users/{user}', 'UserController@destroy');
});

/**
 * User credentials protected routes
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('users/me', 'UserController@me');
});

