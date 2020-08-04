@extends('layout')

@section('custom-filter')
<div class="columns">
    <div class="column">
        <div class="field is-horizontal">
            <div class="field pr-3">
                <div class="select is-small is-rounded">
                    <select id="select-filter-custom">
                        <option selected disabled>Pilih Filter</option>
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
                <th>Jumlah Realisasi</th>
                <th>Jumlah - Grade A+</th>
                <th>Jumlah - Grade A</th>
                <th>Jumlah - Grade B</th>
                <th>Jumlah - Grade C</th>
                <th >Jumlah - Grade Lainnya</th>
                <th>Total Jasa Anyam</th>
                <th>Total Jasa Pengolahan</th>
                <th>Total Pendapatan</th>
            </tr>   
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/production-order/raportPerIbu.js"></script>
@endsection