@extends('layout')

@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>Ibu</th>
                <th>Tanggal Monitoring</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/ibu/jumlahIbuAktifPerLokasi.js"></script>
@endsection