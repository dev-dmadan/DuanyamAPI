<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Exception;
use App\Traits\CreatioHelperTrait;

class ProductionOrderController extends Controller
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

    public function showAllProductionOrderStillCanAlokasi($userId, $page, Request $request)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'ProductionOrderStillCanAlokasi'
        ], 'GET', true, [
            'UserId' => $userId,
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllProductionOrder($page, Request $request)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'ProductionOrder'
        ], 'GET', true, [
            'IsOnlyActivePO' => 1,
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOneProdcutionOrder($id)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'ProductionOrderById'
        ], 'GET', true, [
            'ProductionOrderId' => $id
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllAlokasiLokasi($id, $userId, $page, Request $request)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'AlokasiLokasi'
        ], 'GET', true, [
            'ProductionOrderId' => $id,
            'UserId' => $userId,
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOneAlokasiLokasi($alokasiId)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'AlokasiLokasiById'
        ], 'GET', true, [
            'AlokasiLokasiId' => $alokasiId
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllAlokasiIbuByAlokasiLokasi($alokasiLokasiId)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'AlokasiIbuByAlokasiLokasi'
        ], 'GET', true, [
            'AlokasiLokasiId' => $alokasiLokasiId
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllAlokasiIbuByIbu($ibuId)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'AlokasiIbu'
        ], 'GET', true, [
            'IbuId' => $ibuId,
            'IsOnlyActivePO' => 1
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOfflineProductionOrder($userId, $rangeDate)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'OfflineProductionOrder'
        ], 'GET', true, [
            'UserId' => $userId,
            'RangeDate' => $rangeDate
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function updateAlokasiIbuByAlokasiLokasi($alokasiLokasiId, Request $request)
    {  
        $response = (Object)array(
            'Success' => false,
            'Message' => null
        );
        try {
            if(empty($alokasiLokasiId)) {
                throw new Exception("Alokasi Lokasi Id tidak boleh kosong");
            }

            if(!$request->has('Data') || count($request->input('Data')) < 1) {
                throw new Exception("Alokasi Ibu tidak boleh kosong");
            }
            
            $newAlokasiIbu = array_map(function($value) {
                $newData = array();
                foreach($value as $k => $v) {
                    $newData[ucfirst($k)] = $v;
                }
                return $newData;
            }, $request->input('Data'));

            $responseCreatio = $this->restCreatio([
                'service' => 'DuanyamAPI',
                'method' => 'UpdateAlokasiIbu'
            ], 'POST', false, [
                'AlokasiLokasiId' => $alokasiLokasiId,
                'AlokasiIbu' => $newAlokasiIbu
            ]);
            
            $response->Success = $responseCreatio->Response != null ? $responseCreatio->Response->Success : $responseCreatio->Success;
            $response->Message = $responseCreatio->Response != null ? $responseCreatio->Response->Message : $responseCreatio->Message;
        } catch (Exception $e) {
            $response->Message = $e->getMessage();
        }
        
        return response()->json($response);
    }
}
