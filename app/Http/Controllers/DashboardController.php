<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function realisasiProduksiPerPO()
    {
        return view('realisasiProduksiPerPO', [
            'title' => 'Realisasi produksi per PO',
            'filters' => [
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No PO'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ],
                (Object)[
                    'text' => 'Nama proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan nama proyek'
                    ])
                ],
                // (Object)[
                //     'text' => 'Tanggal PO',
                //     'value' => json_encode([
                //         'type' => 'date',
                //         'placeholder' => 'Masukkan Tanggal PO'
                //     ])
                // ],
                // (Object)[
                //     'text' => 'Created On',
                //     'value' => json_encode([
                //         'type' => 'range-date',
                //         'placeholder' => 'Masukkan Created On'
                //     ])
                // ]
            ]
        ]);
    }
}
