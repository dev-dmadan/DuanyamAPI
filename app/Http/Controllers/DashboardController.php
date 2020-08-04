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
                (Object)[
                    'text' => 'Periode (Bulan-Tahun)',
                    'value' => json_encode([
                        'type' => 'date',
                        'format' => 'MMM-YYYY',
                        'placeholder' => 'Masukkan periode'
                    ])
                ]
            ]
        ]);
    }
}
