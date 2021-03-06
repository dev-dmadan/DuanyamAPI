@extends('layout')
@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>No PO</th>
                <th>Nama Proyek</th>
                <th class="has-text-right">Jumlah Produk</th>
                <th class="has-text-right">Realisasi</th>
                <th class="has-text-right">% Realisasi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/production-order/realisasiProduksiPerPO.js"></script>
@endsection