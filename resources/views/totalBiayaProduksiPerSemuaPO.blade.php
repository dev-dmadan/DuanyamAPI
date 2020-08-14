@extends('template.layout')
@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>No PO</th>
                <th>Lokasi</th>
                <th>Tanggal Monitoring</th>
                <th class="has-text-right">Total Jasa Anyaman</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
                <th class="has-text-right">Total Jasa Kordinasi</th>
                <th class="has-text-right">Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/production-order/totalBiayaProduksiPerSemuaPO.js"></script>
@endsection