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
    
    public function realisasiProduksiPerLokasi()
    {
        return view('realisasiProduksiPerLokasi', [
            'title' => 'Realisasi Produksi Per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Nama proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan nama proyek'
                    ])
                ],
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No PO'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ],
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Lokasi'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ]
            ]
        ]);
    }

    public function realisasiProduksiPerLokasiPerPO()
    {
        return view('realisasiProduksiPerLokasiPerPO', [
            'title' => 'Realisasi Produksi Per Lokasi Per PO',
            'filters' => [
                (Object)[
                    'text' => 'Nama proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan nama proyek'
                    ])
                ],
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No PO'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ],
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Lokasi'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ]
            ]
        ]);
    }

    public function totalBiayaProduksiPerSemuaPO()
    {
        return view('totalBiayaProduksiPerSemuaPO', [
            'title' => 'Total Biaya Produksi Per PO',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal PO Selesai',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan Tanggal PO Selesai'
                    ])
                ]
            ]
        ]);
    }

    public function totalBiayaProduksiPerPO()
    {
        return view('totalBiayaProduksiPerPO', [
            'title' => 'Biaya Produksi PO',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal PO Selesai',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan Tanggal PO Selesai'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No. PO'
                    ])
                ]
            ]

        ]);
    }
    
    public function perdapatanPerIbu()
    {
        return view('perdapatanPerIbu', [
            'title' => 'Pendapatan Per Ibu',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan Tanggal Monitoring'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Nama Proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Nama Proyek'
                    ])
                ],
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No. PO'
                    ])
                ],
                (Object)[
                    'text' => 'Nama Ibu',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Nama Ibu'
                    ])
                ]
            ]

        ]);
    }

    public function avaragePendapatanPerLokasi()
    {
        return view('avaragePendapatanPerLokasi', [
            'title' => 'Average Pendapatan Per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan Tanggal Monitoring'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Nama Proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Nama Proyek'
                    ])
                ],
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No. PO'
                    ])
                ],
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Lokasi'
                    ])
                ]
            ]

        ]);
    }

    public function raportPerIbu()
    {
        return view('raportPerIbu', [
            'title' => 'Average Pendapatan Per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan Tanggal Monitoring'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Nama Ibu',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan Nama Ibu'
                    ])
                ],
            ]

        ]);
    }
}
