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
                <th>No PO</th>
                <th>Lokasi Produksi</th>
                <th>Tanggal Monitoring</th>
                <th class="has-text-right">Total Jasa Anyaman</th>
                <th class="has-text-right">Total Jasa Pengolahan</th>
                <th class="has-text-right">Total Jasa Kordinasi</th>
                <th class="has-text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>P0-2020-001</td>
                <td>Bubuatagamu</td>
                <td>12/17/2018</td>
                <td class="has-text-right">90000</td>
                <td class="has-text-right">85000</td>
                <td class="has-text-right">8750</td>
                <td class="has-text-right">183750</td>
            </tr>
            <tr>
                <td>P0-2020-002</td>
                <td>Wulublolong</td>
                <td>12/24/2018</td>
                <td class="has-text-right">30000</td>
                <td class="has-text-right">35000</td>
                <td class="has-text-right">3250</td>
                <td class="has-text-right">68250</td>
            </tr>
            <tr>
                <td>P0-2020-003</td>
                <td>Watohari</td>
                <td>2/2/2018</td>
                <td class="has-text-right">20000</td>
                <td class="has-text-right">34000</td>
                <td class="has-text-right">3250</td>
                <td class="has-text-right">68250</td>
            </tr>
            <tr>
                <td>P0-2020-004</td>
                <td>Lamawai</td>
                <td>1/13/2018</td>
                <td class="has-text-right">50000</td>
                <td class="has-text-right">45000</td>
                <td class="has-text-right">1250</td>
                <td class="has-text-right">8250</td>
            </tr>
            <tr>
                <td>P0-2020-005</td>
                <td>Lebao</td>
                <td>7/6/2018</td>
                <td class="has-text-right">90000</td>
                <td class="has-text-right">12000</td>
                <td class="has-text-right">8250</td>
                <td class="has-text-right">6250</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/production-order/totalBiayaProduksiPerPO.js"></script>
@endsection