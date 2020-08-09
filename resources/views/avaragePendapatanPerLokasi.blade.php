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
                <th>Lokasi</th>
                <th class="has-text-right">Total Jasa Anyaman</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
                <th class="has-text-right">Total</th>
                <th class="has-text-right">Jumlah Ibu</th>
                <th class="has-text-right">Average Pendapatan Per Lokasi</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>Wulublolong</td>
                <td class="has-text-right">380000</td>
                <td class="has-text-right">220000</td>
                <td class="has-text-right">600000</td>
                <td class="has-text-right">4</td>
                <td class="has-text-right">150000</td>
            </tr>
            <tr>
                <td>Bubuatagamu</td>
                <td class="has-text-right">800000</td>
                <td class="has-text-right">400000</td>
                <td class="has-text-right">1200000</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">400000</td>
            </tr>
            <tr>
                <td>Kalike</td>
                <td class="has-text-right">340000</td>
                <td class="has-text-right">300000</td>
                <td class="has-text-right">640000</td>
                <td class="has-text-right">7</td>
                <td class="has-text-right">91429</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/lokasi/avaragePendapatanPerLokasi.js"></script>
@endsection