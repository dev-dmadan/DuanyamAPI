<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Exception;
use App\Traits\CreatioHelperTrait;

class DashboardAPIController extends Controller
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

    public function realisasiProduksiPerPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'RealisasiProduksiPerPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function detailRealisasiProduksiPerPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'DetailRealisasiProduksiPerPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null,
            'Page' => $request->has('Page') ? $request->input('Page') : 1,
            'isExport' => $request->has('isExport') ? $request->input('isExport') : false
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function realisasiProduksiPerLokasiPerPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'RealisasiProduksiPerLokasiPerPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function detailRealisasiProduksiPerLokasiPerPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'DetailRealisasiProduksiPerLokasiPerPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null,
            'Page' => $request->has('Page') ? $request->input('Page') : 1,
            'isExport' => $request->has('isExport') ? $request->input('isExport') : false
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function totalBiayaProduksiPerPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'TotalBiayaProduksiPerPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function totalBiayaProduksiPerSemuaPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'TotalBiayaProduksiSemuaPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);

        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function detailTotalBiayaProduksiPerPO(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'DetailTotalBiayaProduksiPerPO'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null,
            'Page' => $request->has('Page') ? $request->input('Page') : 1,
            'isExport' => $request->has('isExport') ? $request->input('isExport') : false
        ]);

        if($response->Success) {
            $newData = array_map(function($value) {
                $value['TotalJasaAnyam'] = 'Rp '.number_format($value['TotalJasaAnyam'], 2, ',', '.');
                $value['TotalJasaPengolahan'] = 'Rp '.number_format($value['TotalJasaPengolahan'], 2, ',', '.');
                $value['TotalJasaKoordinasi'] = 'Rp '.number_format($value['TotalJasaKoordinasi'], 2, ',', '.');
                $value['TotalJasa'] = 'Rp '.number_format($value['TotalJasa'], 2, ',', '.');

                return $value;
            }, $response->Response->Data);
            $response->Response->Data = $newData;
        }
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function avaragePendapatanPerLokasi(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'AveragePendaptanPerLokasi'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);

        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function detailAvaragePendapatanPerLokasi(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'DetailResponseDashboardAveragePendaptanPerLokasi'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null,
            'Page' => $request->has('Page') ? $request->input('Page') : 1,
            'isExport' => $request->has('isExport') ? $request->input('isExport') : false
        ]);

        if($response->Success) {
            $newData = array_map(function($value) {
                $value['TotalJasaAnyam'] = 'Rp '.number_format($value['TotalJasaAnyam'], 2, ',', '.');
                $value['TotalJasaPengolahan'] = 'Rp '.number_format($value['TotalJasaPengolahan'], 2, ',', '.');
                $value['AveragePendapatan'] = 'Rp '.number_format($value['AveragePendapatan'], 2, ',', '.');
                $value['TotalJasa'] = 'Rp '.number_format($value['TotalJasa'], 2, ',', '.');

                return $value;
            }, $response->Response->Data);
            $response->Response->Data = $newData;
        }
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function pendapatanPerLokasi(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'PendapatanPerLokasi'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);

        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function detailPendapatanPerLokasi(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'DetailResponseDashboardPendaptanPerLokasi'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null,
            'Page' => $request->has('Page') ? $request->input('Page') : 1,
            'isExport' => $request->has('isExport') ? $request->input('isExport') : false
        ]);

        if($response->Success) {
            $newData = array_map(function($value) {
                $value['TotalJasa'] = 'Rp '.number_format($value['TotalJasa'], 2, ',', '.');
                $value['TotalJasaAnyam'] = 'Rp '.number_format($value['TotalJasaAnyam'], 2, ',', '.');
                $value['TotalJasaPengolahan'] = 'Rp '.number_format($value['TotalJasaPengolahan'], 2, ',', '.');
                $value['TotalJasaKoordinasi'] = 'Rp '.number_format($value['TotalJasaKoordinasi'], 2, ',', '.');
                $value['TotalJasaPucuk'] = 'Rp '.number_format($value['TotalJasaPucuk'], 2, ',', '.');
                
                return $value;
            }, $response->Response->Data);
            $response->Response->Data = $newData;
        }
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function realisasiProduksiPerLokasi(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'RealisasiProduksiPerLokasi'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null
        ]);

        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }

    public function detailRealisasiProduksiPerLokasi(Request $request)
    {
        $response = $this->restCreatio([
            'service' => 'DuanyamCustomDashboardAPI',
            'method' => 'DetailResponseDashboardRealisasiProduksiPerLokasi'
        ], 'POST', true, [
            'MainFilter' => $request->has('MainFilter') ? $request->input('MainFilter') : null,
            'CustomFilter' => $request->has('CustomFilter') ? $request->input('CustomFilter') : null,
            'Page' => $request->has('Page') ? $request->input('Page') : 1,
            'isExport' => $request->has('isExport') ? $request->input('isExport') : false
        ]);
        
        return $response->Success ? response()->json($response->Response) : response()->json($response);
    }
}
