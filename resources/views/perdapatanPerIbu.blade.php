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
                <th>Nama Ibu</th>
                <th class="has-text-right">Total Jasa Anyaman</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Anne</td>
                <td class="has-text-right">95000</td>
                <td class="has-text-right">55000</td>
            </tr>
            <tr>
                <td>Ima Woten</td>
                <td class="has-text-right">100000</td>
                <td class="has-text-right">60000</td>
            </tr>
            <tr>
                <td>Mery Woten</td>
                <td class="has-text-right">135000</td>
                <td class="has-text-right">75000</td>
            </tr>
            <tr>
                <td>Vero</td>
                <td class="has-text-right">50000</td>
                <td class="has-text-right">30000</td>
            </tr>
            <tr>
                <td>Alex</td>
                <td class="has-text-right">150000</td>
                <td class="has-text-right">70000</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/ibu/perdapatanPerIbu.js"></script>
@endsection