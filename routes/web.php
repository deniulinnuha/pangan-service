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
$router->post('/login', 'LoginController@index');
$router->post('/register', 'UserController@register');
$router->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getUser']);
$router->get('/user/detail/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getDetail']);
$router->put('/user/detail/update/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@updateDetail']);
$router->post('/user/detail/create/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@createDetail']);
$router->get('/category', ['middleware' => 'auth', 'uses' =>  'CategoriesController@index']);
$router->post('/category', ['middleware' => 'auth', 'uses' =>  'CategoriesController@createCategories']);
$router->put('/category/{id}', ['middleware' => 'auth', 'uses' =>  'CategoriesController@updateCategories']);
$router->delete('/category/{id}', ['middleware' => 'auth', 'uses' =>  'CategoriesController@deleteCategories']);