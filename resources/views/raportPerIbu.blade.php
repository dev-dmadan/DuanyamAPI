@extends('layout')

@section('custom-filter')
<div class="columns">
    <div class="column">
        <div class="field is-horizontal">
            <div class="field pr-3">
                <div class="select is-small is-rounded">
                    <select id="select-filter-custom">
                        <option value="" selected disabled>Pilih Filter</option>
                            @foreach ($filtersCustom as $filter)
                                <option value="{{ $filter->value }}">{{ $filter->text }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Ibu</th>
                <th>Tanggal Monitoring</th>
                <th>Lokasi</th>
                <th class="has-text-right">Jumlah Realisasi</th>
                <th class="has-text-right">Jumlah - Grade A+</th>
                <th class="has-text-right">Jumlah - Grade A</th>
                <th class="has-text-right">Jumlah - Grade B</th>
                <th class="has-text-right">Jumlah - Grade C</th>
                <th class="has-text-right">Jumlah - Grade Lainnya</th>
                <th class="has-text-right">Total Jasa Anyam</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
                <th class="has-text-right">Total Jasa</th>
            </tr>   
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/ibu/raportPerIbu.js"></script>
@endsection