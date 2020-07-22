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
            'method' => 'DetailMonitoringIbu'
        ], 'GET', true, [
            'MonitoringIbuId' => $monitoringIbuId
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

    public function storeMonitorinOrder($userId, Request $request)
    {
        $response = (Object)array(
            'Success' => false,
            'Message' => null
        );

        try {
            if(!$request->has('UserName')) {
                throw new Exception("Nama user tidak boleh kosong");
            }

            if(!$request->has('Data') || count($request->input('Data')) < 1) {
                throw new Exception("Data Monitoring Order tidak boleh kosong");
            }
    
            $data = $request->input('Data');
            $responseCreatio = $this->restCreatio([
                'service' => 'DuanyamAPI',
                'method' => 'PostMonitoringOrder'
            ], 'POST', true, [
                'Data' => $data,
                'UserId' => $userId,
                'UserName' => $request->input('UserName')
            ]);

            $response->Success = $responseCreatio->Response != null ? $responseCreatio->Response->Success : $responseCreatio->Success;
            $response->Message = $responseCreatio->Response != null ? $responseCreatio->Response->Message : $responseCreatio->Message;
        } catch (Exception $e) {
            $response->Message = $e->getMessage();
        }
        
        return response()->json($response);
    }
}