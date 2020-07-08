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
}
