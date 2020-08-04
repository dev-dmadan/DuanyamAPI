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
                <th class="has-text-right">Jumlah Realisasi</th>
                <th class="has-text-right">Jumlah - Grade A+</th>
                <th class="has-text-right">Jumlah - Grade A</th>
                <th class="has-text-right">Jumlah - Grade B</th>
                <th class="has-text-right">Jumlah - Grade C</th>
                <th class="has-text-right">Jumlah - Grade Lainnya</th>
                <th class="has-text-right">Total Jasa Anyam</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
                <th class="has-text-right">Total Pendapatan</th>
            </tr>   
        </thead>
        <tbody>
            <tr>
                <td>Dese Mini</td>
                <td class="has-text-right">4</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">1</td>
                <td class="has-text-right"></td>
                <td class="has-text-right">0</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">250000</td>
                <td class="has-text-right">125000</td>
                <td class="has-text-right">375000</td>
            </tr>
            <tr>
                <td>Dese Tanduk</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">1</td>
                <td class="has-text-right">2</td>
                <td class="has-text-right">4</td>
                <td class="has-text-right">2</td>
                <td class="has-text-right">7</td>
                <td class="has-text-right">350000</td>
                <td class="has-text-right">125000</td>
                <td class="has-text-right">575000</td>
            </tr>
            <tr>
                <td>Sobe S</td>
                <td class="has-text-right">2</td>
                <td class="has-text-right">1</td>
                <td class="has-text-right">1</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">1</td>
                <td class="has-text-right">2</td>
                <td class="has-text-right">150000</td>
                <td class="has-text-right">225000</td>
                <td class="has-text-right">475000</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/ibu/raportPerIbu.js"></script>
@endsection