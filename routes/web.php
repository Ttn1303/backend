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

$router->get('/user', 'UserController@index');
$router->get('/customers', 'CustomerController@index');
$router->get('/brand', 'BrandController@index');
// $router->get('/vehicle-infor', 'VehicleInforController@index');

$router->get('/accessary', 'AccessaryController@index');
$router->delete('/accessary/delete/{id}', 'AccessaryController@destroy');
$router->get('/accessary-group/group', 'AccessaryGroupController@index');
$router->get('/accessary-group/unit', 'AccessaryGroupController@create');

$router->get('/repair', 'RepairController@index');
$router->get('/repair/{id}', 'RepairController@show');
$router->get('/add-repair', 'RepairController@addRepair');
$router->delete('repair/delete/{id}', 'RepairController@deleteRepair');
$router->get('/search', 'RepairController@search');