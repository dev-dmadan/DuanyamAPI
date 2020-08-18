<?php

namespace App\Http\Controllers;

use App\Helpers\ColorConstantaHelper as Colors;
use App\Helpers\ColumnTypeConstantaHelper as ColumnType;
use App\Helpers\OrderTypeConstantaHelper as OrderType;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }
    
    public function realisasiProduksiPerPO()
    {
        $title = 'Realisasi Produksi per PO';
        $tooltip = 'Realisasi PO yang statusnya masih aktif';
        $color = Colors::$BLUE;
        $mainFilter = array(
            (Object)[
                'text' => 'No. PO',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan No PO'
                ])
            ],
            (Object)[
                'text' => 'Nama proyek',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrNamaProyek'
                    ],
                    'placeholder' => 'Masukkan nama proyek'
                ])
            ]
        );
        $customFilter = array();
        $orderBy = array(
            (Object)[
                'text' => 'No. PO (Asc)',
                'value' => json_encode([
                    'type' => OrderType::$ASC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'No. PO (Desc)',
                'value' => json_encode([
                    'type' => OrderType::$DESC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'Tanggal PO (Asc)',
                'value' => json_encode([
                    'type' => OrderType::$ASC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'Tanggal PO (Desc)',
                'value' => json_encode([
                    'type' => OrderType::$DESC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'Deadline PO (Asc)',
                'value' => json_encode([
                    'type' => OrderType::$ASC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'Deadline PO (Desc)',
                'value' => json_encode([
                    'type' => OrderType::$DESC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => '% Realisasi (Asc)',
                'value' => json_encode([
                    'type' => OrderType::$ASC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrRealisasi'
                    ]
                ])
            ],
            (Object)[
                'text' => '% Realisasi (Desc)',
                'value' => json_encode([
                    'type' => OrderType::$DESC,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrRealisasi'
                    ]
                ])
            ]
        );

        return view('realisasiProduksiPerPO', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function realisasiPerItemGrading()
    {
        $title = 'Realisasi Produksi per Item Grading';
        $tooltip = 'Realisasi Produk berdasarkan grading per lokasi dan pada periode (tanggal monitoring) tertentu';
        $color = Colors::$GREEN;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrViewJasaAnyam',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'Produk',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrProduk',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Produk'
                ])
            ]
        );
        $orderBy = array(
            (Object)[
                'text' => 'Lokasi (Asc)',
                'value' => json_encode([
                    'type' => OrderType::$ASC,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'Lokasi (Desc)',
                'value' => json_encode([
                    'type' => OrderType::$DESC,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ]
                ])
            ]
        );

        return view('realisasiPerItemGrading', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function pendapatanPerLokasi()
    {
        $title = 'Pendapatan per Lokasi';
        $tooltip = 'Total Jasa Anyam, Pengolahan, Pucuk, dan Koordinasi per lokasi pada periode (tanggal monitoring) tertentu';
        $color = Colors::$YELLOW;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrMonitoringOrder',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'Lokasi',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Lokasi'
                ])
            ]
        );
        $orderBy = array(
            (Object)[
                'text' => 'Lokasi (Asc)',
                'value' => json_encode([
                    'type' => OrderType::$ASC,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ]
                ])
            ],
            (Object)[
                'text' => 'Lokasi (Desc)',
                'value' => json_encode([
                    'type' => OrderType::$DESC,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ]
                ])
            ]
        );

        return view('pendapatanPerLokasi', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function topXibu()
    {
        $title = 'Top X Ibu';
        $tooltip = 'Average pendapatan ibu per bulan pada periode (tanggal monitoring) tertentu';
        $color = Colors::$RED;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrViewTopXIbu',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'Ibu',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrKeluargaIbu',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Nama Ibu'
                ])
            ]
        );
        $orderBy = array();

        return view('topXibu', [
            'title' => $tooltip,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function jumlahIbuAktifPerLokasi()
    {
        $title = 'Jumlah Ibu Aktif per Lokasi';
        $tooltip = 'Jumlah ibu yang dimonitoring disetiap daerah pada periode (tanggal monitoring) tertentu';
        $color = Colors::$SOFT_BLUE;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrMonitoringOrder',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array();
        $orderBy = array();

        return view('jumlahIbuAktifPerLokasi', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilter' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function jumlahIbuAktifPerPeriode()
    {
        $title = 'Jumlah Ibu Aktif per Periode';
        $tooltip = 'Jummlah ibu yang dimonitoring per periode bulan dan tahun tertentu';
        $color = Colors::$SOFT_GREEN;
        $mainFilter = array(
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
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrMonitoringOrder',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan tanggal'
                ])
            ]
        );
        $customFilter = array();
        $orderBy = array();

        return view('jumlahIbuAktifPerPeriode', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilter' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }
    
    public function realisasiProduksiPerLokasi()
    {
        $title = 'Realisasi Produksi per Lokasi';
        $tooltip = 'Realisasi PO yang statusnya masih aktif per lokasi';
        $color = Colors::$BLACK;
        $mainFilter = array(
            (Object)[
                'text' => 'Lokasi',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Lokasi'
                ])
            ]
        );
        $customFilter = array();
        $orderBy = array();

        return view('realisasiProduksiPerLokasi', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilter' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function realisasiProduksiPerLokasiPerPO()
    {
        $title = 'Realisasi Produksi Lokasi per PO';
        $tooltip = 'Realisasi PO yang statusnya masih aktif per lokasi per PO';
        $color = Colors::$SOFT_BLUE;
        $mainFilter = array(
            (Object)[
                'text' => 'No. PO',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
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
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Lokasi'
                    // 'fetch' => 'dashboard/lookup/production-order/page/1?SecretKey='.env('API_SECRET_KEY')
                ])
            ]
        );
        $customFilter = array();
        $orderBy = array();

        return view('realisasiProduksiPerLokasiPerPO', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilter' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function totalBiayaProduksiPerSemuaPO()
    {
        $title = 'Total Biaya Produksi Semua PO';
        $tooltip = '';
        $color = Colors::$BLUE;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal PO Selesai',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrTanggalClosingPO'
                    ],
                    'placeholder' => 'Masukkan Tanggal PO Selesai'
                ])
            ]
        );
        $customFilter = array();
        $orderBy = array();

        return view('totalBiayaProduksiPerSemuaPO', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilter' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function totalBiayaProduksiPerPO()
    {
        $title = 'Biaya Produksi per PO';
        $tooltip = '';
        $color = Colors::$GREEN;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal PO Selesai',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrTanggalClosingPO'
                    ],
                    'placeholder' => 'Masukkan Tanggal PO Selesai'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'No. PO',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrProductionOrder',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan No. PO'
                ])
            ]
        );
        $orderBy = array();

        return view('totalBiayaProduksiPerPO', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }
    
    public function pendapatanPerIbu()
    {
        $title = 'Pendapatan per Ibu';
        $tooltip = '';
        $color = Colors::$YELLOW;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrViewTopXIbu',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'Nama Ibu',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrKeluargaIbu',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Nama Ibu'
                ])
            ]
        );
        $orderBy = array();

        return view('pendapatanPerIbu', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function avaragePendapatanPerLokasi()
    {
        $title = 'Average Pendapatan per Lokasi';
        $tooltip = '';
        $color = Colors::$RED;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'UsrMonitoringOrder',
                        'column' => 'UsrTanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'Lokasi',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'UsrLokasi',
                        'column' => 'UsrName'
                    ],
                    'placeholder' => 'Masukkan Lokasi'
                ])
            ]
        );
        $orderBy = array();

        return view('avaragePendapatanPerLokasi', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }

    public function raportPerIbu()
    {
        $title = 'Raport per Ibu';
        $tooltip = '';
        $color = Colors::$SOFT_GREEN;
        $mainFilter = array(
            (Object)[
                'text' => 'Tanggal Monitoring',
                'value' => json_encode([
                    'type' => ColumnType::$RANGE_DATE,
                    'column' => [
                        'source' => 'A',
                        'column' => 'TanggalMonitoring'
                    ],
                    'placeholder' => 'Masukkan Tanggal Monitoring'
                ])
            ]
        );
        $customFilter = array(
            (Object)[
                'text' => 'Nama Ibu',
                'value' => json_encode([
                    'type' => ColumnType::$TEXT,
                    'column' => [
                        'source' => 'A',
                        'column' => 'Ibu'
                    ],
                    'placeholder' => 'Masukkan Nama Ibu'
                ])
            ]
        );
        $orderBy = array();

        return view('raportPerIbu', [
            'title' => $title,
            'tooltip' => $tooltip,
            'color' => $color,
            'mainFilters' => $mainFilter,
            'customFilters' => $customFilter,
            'orderBy' => $orderBy
        ]);
    }
}
