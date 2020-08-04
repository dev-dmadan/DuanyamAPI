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
            'title' => 'Realisasi Produksi per PO',
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
            ]
        ]);
    }

    public function realisasiPerItemGrading()
    {
        return view('realisasiPerItemGrading', [
            'title' => 'Realisasi Produksi per Item - Grading (Semua Produk)',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan tanggal'
                    ])
                ]
            ]
        ]);
    }

    public function realisasiPerItemGradingPerProduk()
    {
        return view('realisasiPerItemGradingPerProduk', [
            'title' => 'Realisasi Produksi per Item - Grading',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan tanggal'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Nama produk',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan nama produk'
                    ])
                ],
            ]
        ]);
    }

    public function pendapatanPerLokasi()
    {
        return view('pendapatanPerLokasi', [
            'title' => 'Pendapatan per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan tanggal'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Nama proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan nama proyek'
                    ])
                ],
                (Object)[
                    'text' => 'No PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan No PO'
                    ])
                ],
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan lokasi'
                    ])
                ],
            ]
        ]);
    }

    public function topXibu()
    {
        return view('topXibu', [
            'title' => 'Top X Ibu',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan tanggal'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Ibu',
                    'value' => json_encode([
                        'type' => 'text',
                        'placeholder' => 'Masukkan ibu'
                    ])
                ],
            ]
        ]);
    }

    public function jumlahIbuAktifPerLokasi()
    {
        return view('jumlahIbuAktifPerLokasi', [
            'title' => 'Jumlah Ibu Aktif per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan tanggal'
                    ])
                ]
            ]
        ]);
    }

    public function jumlahIbuAktifPerPeriode()
    {
        return view('jumlahIbuAktifPerPeriode', [
            'title' => 'Jumlah Ibu Aktif per Periode',
            'filters' => [
                // (Object)[
                //     'text' => 'Periode (Bulan-Tahun)',
                //     'value' => json_encode([
                //         'type' => 'date',
                //         'isPeriod' => true,
                //         'format' => 'MMM-YYYY',
                //         'placeholder' => 'Masukkan periode'
                //     ])
                // ]
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'placeholder' => 'Masukkan tanggal'
                    ])
                ]
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
            'title' => 'Total Biaya Produksi Semua PO',
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
            'title' => 'Biaya Produksi Per PO',
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
            'title' => 'Raport Per Ibu',
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
