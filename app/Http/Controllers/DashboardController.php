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
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan No PO'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ],
                (Object)[
                    'text' => 'Nama proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrNamaProyek'
                        ],
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
                        'column' => [
                            'source' => 'UsrViewJasaAnyam',
                            'column' => 'UsrTanggalMonitoring'
                        ],
                        'placeholder' => 'Masukkan Tanggal Monitoring'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Produk',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrProduk',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Produk'
                    ])
                ],
                (Object)[
                    'text' => 'No PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Produk'
                    ])
                ],
                (Object)[
                    'text' => 'Proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrViewJasaAnyam',
                            'column' => 'UsrNamaProyek'
                        ],
                        'placeholder' => 'Masukkan Produk'
                    ])
                ],
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrLokasi',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Lokasi'
                    ])
                ],
                (Object)[
                    'text' => 'Ibu',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrKeluargaIbu',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Nama Ibu'
                    ])
                ]
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
                        'column' => [
                            'source' => 'UsrMonitoringOrder',
                            'column' => 'UsrTanggalMonitoring'
                        ],
                        'placeholder' => 'Masukkan Tanggal Monitoring'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrLokasi',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Lokasi'
                    ])
                ]
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
            'title' => 'Realisasi Produksi per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrLokasi',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Lokasi'
                    ])
                ]
            ]
        ]);
    }

    public function realisasiProduksiPerLokasiPerPO()
    {
        return view('realisasiProduksiPerLokasiPerPO', [
            'title' => 'Realisasi Produksi Lokasi per PO',
            'filters' => [
                (Object)[
                    'text' => 'Nama proyek',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrNamaProyek'
                        ],
                        'placeholder' => 'Masukkan nama proyek'
                    ])
                ],
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan No PO'
                        // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                    ])
                ],
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrLokasi',
                            'column' => 'UsrName'
                        ],
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
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrTanggalClosingPO'
                        ],
                        'placeholder' => 'Masukkan Tanggal PO Selesai'
                    ])
                ]
            ]
        ]);
    }

    public function totalBiayaProduksiPerPO()
    {
        return view('totalBiayaProduksiPerPO', [
            'title' => 'Biaya Produksi per PO',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal PO Selesai',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrTanggalClosingPO'
                        ],
                        'placeholder' => 'Masukkan Tanggal PO Selesai'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'No. PO',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrProductionOrder',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan No. PO'
                    ])
                ]
            ]

        ]);
    }
    
    public function perdapatanPerIbu()
    {
        return view('perdapatanPerIbu', [
            'title' => 'Pendapatan per Ibu',
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
            'title' => 'Average Pendapatan per Lokasi',
            'filters' => [
                (Object)[
                    'text' => 'Tanggal Monitoring',
                    'value' => json_encode([
                        'type' => 'range-date',
                        'column' => [
                            'source' => 'UsrMonitoringOrder',
                            'column' => 'UsrTanggalMonitoring'
                        ],
                        'placeholder' => 'Masukkan Tanggal Monitoring'
                    ])
                ]
            ],
            'filtersCustom' => [
                (Object)[
                    'text' => 'Lokasi',
                    'value' => json_encode([
                        'type' => 'text',
                        'column' => [
                            'source' => 'UsrLokasi',
                            'column' => 'UsrName'
                        ],
                        'placeholder' => 'Masukkan Lokasi'
                    ])
                ]
            ]

        ]);
    }

    public function raportPerIbu()
    {
        return view('raportPerIbu', [
            'title' => 'Raport per Ibu',
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
