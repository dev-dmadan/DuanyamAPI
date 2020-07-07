<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Exception;
use App\Traits\CreatioHelperTrait;

class LokasiController extends Controller
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

    public function showAllLokasi($page)
    {
        $search = $request->query('Search') != null ? $request->query('Search') : '';
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'Lokasi'
        ], 'GET', true, [
            'Page' => $page,
            'Search' => $search
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function showOfflineLokasi()
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamAPI',
            'method' => 'OfflineLokasi'
        ], 'GET');
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }
}
