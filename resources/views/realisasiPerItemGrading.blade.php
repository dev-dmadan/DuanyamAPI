@extends('layout')

@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>No PO</th>
                <th>Tanggal Monitoring</th>
                <th>Lokasi</th>
                <th class="has-text-right">Realisasi</th>
                <th class="has-text-right">Grade A+</th>
                <th class="has-text-right">Grade A</th>
                <th class="has-text-right">Grade B</th>
                <th class="has-text-right">Grade C</th>
                <th class="has-text-right">Lainnya</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/lokasi/realisasiPerItemGradingPerProduk.js"></script>
@endsection