<?php
use Illuminate\Support\Facades\Route;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('/login', 'AuthController@postLogin');
$router->post('/change-password', 'AuthController@change_password');

$router->get('/user', 'UserController@index');
$router->get('/user/{id}', 'UserController@show');
$router->post('/user/create', 'UserController@store');
$router->post('/user/update/{id}', 'UserController@update');
$router->delete('/user/delete/{id}', 'UserController@destroy');

$router->get('/customers', 'CustomerController@index');
$router->get('/brand', 'BrandController@index');

$router->get('/accessary', 'AccessaryController@index');
$router->get('/accessary/list', 'AccessaryController@list');
$router->get('/accessary/listUser', 'AccessaryController@listUser');
$router->get('/accessary/{id}', 'AccessaryController@show');
$router->post('/accessary/create', 'AccessaryController@store');
$router->post('/accessary/add-quantity/{id}', 'AccessaryController@addQuantity');
$router->delete('/accessary/delete/{id}', 'AccessaryController@destroy');

$router->get('/accessary-group/group', 'AccessaryGroupController@indexGroup');
$router->get('/accessary-group/unit', 'AccessaryGroupController@indexUnit');
$router->post('/accessary-group/create', 'AccessaryGroupController@store');

$router->get('/repair', 'RepairController@index');
$router->get('/repair/transaction', 'RepairController@transaction');
$router->get('/repair/dashboard', 'RepairController@dashboard');
$router->get('/repair/{id}', 'RepairController@show');
$router->post('/repair/create', 'RepairController@store');
$router->post('/repair/{id}', 'RepairController@update');
$router->delete('/repair/delete/{id}', 'RepairController@destroy');

$router->get('/repair-detail/{id}', 'RepairDetailController@show');
$router->post('/repair-detail/add-accessary-quantity/{id}', 'RepairDetailController@addAccessaryQuantity');
$router->post('/repair-detail/update-repair/{id}', 'RepairDetailController@update');
$router->post('repair-detail/delete/{id}', 'RepairDetailController@destroy');

$router->get('/receipt', 'ReceiptController@index');
$router->post('/receipt/sale', 'ReceiptController@sales');