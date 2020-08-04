@extends('layout')
@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>No PO</th>
                <th>Lokasi Produksi</th>
                <th>Tanggal Monitoring</th>
                <th>Total Jasa Anyaman</th>
                <th>Total Jasa Pengolahan</th>
                <th>Total Jasa Kordinasi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/production-order/totalBiayaProduksiPerSemuaPO.js"></script>
@endsection