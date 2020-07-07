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

// api
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    /** Lookup */
        $router->get('lookups',  ['uses' => 'LookupController@showAllLookup']);
        $router->get('lookups/grading',  ['uses' => 'LookupController@showAllGrading']);
        $router->get('lookups/master-data-pengolahan',  ['uses' => 'LookupController@showAllMasterDataPengolahan']);
        $router->get('lookups/master-data-bahan-baku',  ['uses' => 'LookupController@showAllMasterDataBahanBaku']);
    /** End Lookup */

    /** Lokasi */
        $router->get('lokasi/page/{page}',  ['uses' => 'LokasiController@showAllLokasi']);
        $router->get('lokasi/offline',  ['uses' => 'LokasiController@showOfflineLokasi']);
    /** End Lokasi */

    /** Production Order */
        $router->get('production-order/page/{page}',  ['uses' => 'ProductionOrderController@showAllProductionOrder']);
        $router->get('production-order/{id}',  ['uses' => 'ProductionOrderController@showOneProdcutionOrder']);
        $router->get('production-order/user/{userId}/page/{page}',  ['uses' => 'ProductionOrderController@showAllProductionOrderStillCanAlokasi']);
        $router->get('production-order/{id}/alokasi-lokasi/user/{userId}/page/{page}',  ['uses' => 'ProductionOrderController@showAllAlokasiLokasi']);
        $router->get('production-order/alokasi-lokasi/{alokasiId}',  ['uses' => 'ProductionOrderController@showOneAlokasiLokasi']);
        $router->get('production-order/alokasi-ibu/ibu/{ibuId}',  ['uses' => 'ProductionOrderController@showAllAlokasiIbuByIbu']);
        $router->get('production-order/alokasi-ibu/alokasi-lokasi/{alokasiLokasiId}',  ['uses' => 'ProductionOrderController@showAllAlokasiIbuByAlokasiLokasi']);
    /** End Production Order */

    /** Monitoring Order */
        $router->get('monitoring-order/user/{userId}/page/{page}',  ['uses' => 'MonitoringOrderController@showAllMonitoringOrder']);
        $router->get('monitoring-order/{id}',  ['uses' => 'MonitoringOrderController@showOneMonitoringOrder']);
        $router->get('monitoring-order/{monitoringOrderId}/jasa-pucuk',  ['uses' => 'MonitoringOrderController@showAllJasaPucuk']);
        $router->get('monitoring-order/{monitoringOrderId}/monitoring-ibu',  ['uses' => 'MonitoringOrderController@showAllMonitoringIbu']);
        $router->get('monitoring-order/monitoring-ibu/{monitoringIbuId}',  ['uses' => 'MonitoringOrderController@showAllDetailMonitoringIbu']);
    /** End Monitoring Order */
});