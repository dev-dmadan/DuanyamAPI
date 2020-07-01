<?php

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

$router->post('/login', 'LoginController@login');

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('lookups',  ['uses' => 'LookupController@showAllLookup']);
    $router->get('lookups/grading',  ['uses' => 'LookupController@showAllGrading']);
    $router->get('lookups/master-data-pengolahan',  ['uses' => 'LookupController@showAllMasterDataPengolahan']);
    $router->get('lookups/master-data-bahan-baku',  ['uses' => 'LookupController@showAllMasterDataBahanBaku']);

    $router->get('masters', ['uses' => 'MasterController@showAllMaster']);
    $router->get('masters/lokasi', ['uses' => 'MasterController@showAllMasterLokasi']);
    $router->get('masters/ibu', ['uses' => 'MasterController@showAllMasterIbu']);
    // $router->get('production-orders/', ['uses' => 'AuthorController@create']);
    // $router->get('monitoring-orders/{type}/{range?}', ['uses' => 'AuthorController@create']);
});