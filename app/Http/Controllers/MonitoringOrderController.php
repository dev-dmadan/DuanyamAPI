<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Exception;
use App\Traits\CreatioHelperTrait;

class MonitoringOrderController extends Controller
{
    use CreatioHelperTrait {
        CreatioHelperTrait::__construct as private creatioHelper;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->creatioHelper();
    }

    public function showAllMonitoringOrder($userId, $page, Request $request)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'MonitoringOrder'
        ], 'GET', true, [
            'UserId' => $userId,
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOneMonitoringOrder($id)
    {  
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'MonitoringOrderById'
        ], 'GET', true, [
            'MonitoringOrderId' => $id
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllJasaPucuk($monitoringOrderId)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'JasaPucuk'
        ], 'GET', true, [
            'MonitoringOrderId' => $monitoringOrderId
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllMonitoringIbu($monitoringOrderId)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'MonitoringIbu'
        ], 'GET', true, [
            'MonitoringOrderId' => $monitoringOrderId
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllDetailMonitoringIbu($monitoringIbuId)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'MonitoringIbu'
        ], 'GET', true, [
            'MonitoringOrderId' => $monitoringIbuId
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOfflineProductionOrder($userId, $rangeDate)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'OfflineMonitoringOrder'
        ], 'GET', true, [
            'UserId' => $userId,
            'RangeDate' => $rangeDate
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }
}