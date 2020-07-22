<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Exception;
use App\Traits\CreatioHelperTrait;

class IbuController extends Controller
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

    public function showAllIbu($page, Request $request)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'Ibu'
        ], 'GET', true, [
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOneIbu($id)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'IbuById'
        ], 'GET', true, [
            'IbuId' => $id
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showAllIbuByLokasi($lokasiId, $page, Request $request)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'IbuByLokasi'
        ], 'GET', true, [
            'LokasiId' => $lokasiId,
            'IsOnlyActivePO' => 1,
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }
}
