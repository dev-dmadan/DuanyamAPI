@extends('template.layout')

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
                <th>Nama Ibu</th>
                <th>Lokasi</th>
                <th>Tanggal Monitoring</th>
                <th class="has-text-right">Total Jasa Anyaman</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
                <th class="has-text-right">Total Jasa Pendapatan</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/ibu/pendapatanPerIbu.js"></script>
@endsection