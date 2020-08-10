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

$router->post('/sync-user', ['middleware' => 'auth_secret_key', 'uses' => 'SyncUserController@syncUser']);
$router->post('/login', 'LoginController@login');

// api
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    /** Lookup */
        $router->get('lookups',  ['uses' => 'LookupController@showAllLookup']);
        $router->get('lookups/grading',  ['uses' => 'LookupController@showAllGrading']);
        $router->get('lookups/master-data-pengolahan',  ['uses' => 'LookupController@showAllMasterDataPengolahan']);
        $router->get('lookups/master-data-bahan-baku',  ['uses' => 'LookupController@showAllMasterDataBahanBaku']);
    /** End Lookup */

    /** Ibu */
        $router->get('ibu/page/{page}',  ['uses' => 'IbuController@showAllIbu']);
        $router->get('ibu/{id}',  ['uses' => 'IbuController@showOneIbu']);
        $router->get('ibu/lokasi/{lokasiId}/page/{page}',  ['uses' => 'IbuController@showAllIbuByLokasi']);
    /** End Ibu */

    /** Lokasi */
        $router->get('lokasi/page/{page}',  ['uses' => 'LokasiController@showAllLokasi']);
        $router->get('lokasi/offline',  ['uses' => 'LokasiController@showOfflineLokasi']);
        $router->get('lokasi/{id}',  ['uses' => 'LokasiController@showOneLokasi']);
    /** End Lokasi */

    /** Production Order */
        $router->get('production-order/page/{page}',  ['uses' => 'ProductionOrderController@showAllProductionOrder']);
        $router->get('production-order/{id}',  ['uses' => 'ProductionOrderController@showOneProdcutionOrder']);
        $router->get('production-order/user/{userId}/page/{page}',  ['uses' => 'ProductionOrderController@showAllProductionOrderStillCanAlokasi']);
        $router->get('production-order/{id}/alokasi-lokasi/user/{userId}/page/{page}',  ['uses' => 'ProductionOrderController@showAllAlokasiLokasi']);
        $router->get('production-order/alokasi-lokasi/{alokasiId}',  ['uses' => 'ProductionOrderController@showOneAlokasiLokasi']);
        $router->get('production-order/alokasi-ibu/ibu/{ibuId}',  ['uses' => 'ProductionOrderController@showAllAlokasiIbuByIbu']);
        $router->get('production-order/alokasi-ibu/alokasi-lokasi/{alokasiLokasiId}',  ['uses' => 'ProductionOrderController@showAllAlokasiIbuByAlokasiLokasi']);
        $router->get('production-order/offline/{userId}/range-date/{rangeDate}',  ['uses' => 'ProductionOrderController@showOfflineProductionOrder']);

        $router->put('production-order/alokasi-ibu/alokasi-lokasi/{alokasiLokasiId}',  ['uses' => 'ProductionOrderController@updateAlokasiIbuByAlokasiLokasi']);
        $router->post('production-order/sync/alokasi-ibu',  ['uses' => 'ProductionOrderController@syncAllAlokasiIbu']);
    /** End Production Order */

    /** Monitoring Order */
        $router->get('monitoring-order/user/{userId}/page/{page}',  ['uses' => 'MonitoringOrderController@showAllMonitoringOrder']);
        $router->get('monitoring-order/{id}',  ['uses' => 'MonitoringOrderController@showOneMonitoringOrder']);
        $router->get('monitoring-order/{monitoringOrderId}/jasa-pucuk',  ['uses' => 'MonitoringOrderController@showAllJasaPucuk']);
        $router->get('monitoring-order/{monitoringOrderId}/monitoring-ibu',  ['uses' => 'MonitoringOrderController@showAllMonitoringIbu']);
        $router->get('monitoring-order/monitoring-ibu/{monitoringIbuId}',  ['uses' => 'MonitoringOrderController@showAllDetailMonitoringIbu']);
        $router->get('monitoring-order/offline/{userId}/range-date/{rangeDate}',  ['uses' => 'MonitoringOrderController@showOfflineProductionOrder']);

        $router->post('monitoring-order/user/{userId}',  ['uses' => 'MonitoringOrderController@storeMonitorinOrder']);
        $router->post('monitoring-order/sync/user/{userId}',  ['uses' => 'MonitoringOrderController@syncAllMonitorinOrder']);
    /** End Monitoring Order */
    
});

// dashboard
$router->group(['prefix' => 'dashboard', 'middleware' => 'auth_secret_key'], function () use ($router) {
    $router->get('realisasi-produksi-per-po',  ['uses' => 'DashboardController@realisasiProduksiPerPO']);
    $router->get('realisasi-per-item-grading',  ['uses' => 'DashboardController@realisasiPerItemGrading']);
    $router->get('realisasi-per-item-grading-per-produk',  ['uses' => 'DashboardController@realisasiPerItemGradingPerProduk']);
    $router->get('pendapatan-per-lokasi',  ['uses' => 'DashboardController@pendapatanPerLokasi']);
    $router->get('top-x-ibu',  ['uses' => 'DashboardController@topXibu']);
    $router->get('jumlah-ibu-aktif-per-lokasi',  ['uses' => 'DashboardController@jumlahIbuAktifPerLokasi']);
    $router->get('jumlah-ibu-aktif-per-periode',  ['uses' => 'DashboardController@jumlahIbuAktifPerPeriode']);
    $router->get('realisasi-produksi-per-lokasi',  ['uses' => 'DashboardController@realisasiProduksiPerLokasi']);
    $router->get('realisasi-produksi-per-lokasi-per-po',  ['uses' => 'DashboardController@realisasiProduksiPerLokasiPerPO']);
    $router->get('total-biaya-per-po',  ['uses' => 'DashboardController@totalBiayaProduksiPerPO']);
    $router->get('total-biaya-per-semua-po',  ['uses' => 'DashboardController@totalBiayaProduksiPerSemuaPO']);
    $router->get('pendapatan-per-ibu',  ['uses' => 'DashboardController@perdapatanPerIbu']);
    $router->get('avarage-pendapatan-per-lokasi',  ['uses' => 'DashboardController@avaragePendapatanPerLokasi']);
    $router->get('raport-ibu',  ['uses' => 'DashboardController@raportPerIbu']);

    $router->get('lookup/production-order/page/{page}',  ['uses' => 'ProductionOrderController@showAllProductionOrder']);
});

// dashboard api
$router->group(['prefix' => 'dashboard/api', 'middleware' => 'auth_secret_key'], function () use ($router) {
    $router->post('realisasi-produksi-per-po',  ['uses' => 'DashboardAPIController@realisasiProduksiPerPO']);
    $router->post('detail-realisasi-produksi-per-po',  ['uses' => 'DashboardAPIController@detailRealisasiProduksiPerPO']);
    $router->post('realisasi-produksi-per-lokasi-per-po',  ['uses' => 'DashboardAPIController@realisasiProduksiPerLokasiPerPO']);
    $router->post('detail-realisasi-produksi-per-lokasi-per-po',  ['uses' => 'DashboardAPIController@detailRealisasiProduksiPerLokasiPerPO']);
    $router->post('total-biaya-per-po',  ['uses' => 'DashboardAPIController@totalBiayaProduksiPerPO']);
    $router->post('total-biaya-per-semua-po',  ['uses' => 'DashboardAPIController@totalBiayaProduksiPerSemuaPO']);
    $router->post('detail-total-biaya-per-po',  ['uses' => 'DashboardAPIController@detailTotalBiayaProduksiPerPO']);
    $router->post('avarage-pendapatan-per-lokasi',  ['uses' => 'DashboardAPIController@avaragePendapatanPerLokasi']);
    $router->post('detail-average-pendaptan-per-lokasi',  ['uses' => 'DashboardAPIController@detailAvaragePendapatanPerLokasi']);
    $router->post('pendapatan-per-lokasi',  ['uses' => 'DashboardAPIController@pendapatanPerLokasi']);
    $router->post('detail-pendapatan-per-lokasi',  ['uses' => 'DashboardAPIController@detailPendapatanPerLokasi']);
    $router->post('top-x-ibu',  ['uses' => 'DashboardAPIController@topXibu']);
    $router->post('detail-top-x-ibu',  ['uses' => 'DashboardAPIController@detailTopXibu']);
});