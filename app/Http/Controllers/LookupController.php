<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;
use App\Traits\CreatioHelperTrait;

class LookupController extends Controller
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
        // 
        $this->creatioHelper();
    }

    public function showAllLookup()
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'Lookups'
        ], 'GET');
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllGrading()
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'GradingLookup'
        ], 'GET');
        
        return response()->json($response->Response);
    }

    public function showAllMasterDataPengolahan()
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'MasterDataPengolahan'
        ], 'GET');
        
        return response()->json($response->Response);
    }

    public function showAllMasterDataBahanBaku()
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'MasterDataBahanBaku'
        ], 'GET');
        
        return response()->json($response->Response);
    }
}
