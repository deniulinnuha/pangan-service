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
$router->get('/user', 'UserController@getAll');
$router->get('/user/{id}', 'UserController@getUser');
$router->put('/user/{id}', 'UserController@updateUser');
$router->get('/user/detail/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getDetail']);
$router->put('/user/detail/update/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@updateDetail']);
$router->post('/user/detail/create/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@createDetail']);
$router->get('/category', 'CategoriesController@index');
$router->get('/category/{id}', 'CategoriesController@getCategories');
$router->post('/category', 'CategoriesController@createCategories');
$router->put('/category/{id}', 'CategoriesController@updateCategories');
$router->delete('/category/{id}', 'CategoriesController@deleteCategories');
$router->get('/warehouse', 'WarehouseController@index');
$router->get('/warehouse/{id}', 'WarehouseController@getWarehouse');
$router->get('/warehouse/byuser/{id}', 'WarehouseController@getWarehousebyUser');
$router->post('/warehouse', 'WarehouseController@createWarehouse');
$router->put('/warehouse/{id}', 'WarehouseController@updateWarehouse');
$router->delete('/warehouse/{id}', 'WarehouseController@deleteWarehouse');
$router->get('/comodities/{id}', 'ComoditiesController@index');
$router->post('/comodities', 'ComoditiesController@createComodities');
$router->put('/comodities/{id}', 'ComoditiesController@updateComodities');
$router->delete('/comodities/{id}', 'ComoditiesController@deleteComodities');
$router->get('/comodities/edit/{id}', 'ComoditiesController@getComodities');