@extends('layout')
@section('detail-chart')
    <table id="tableDetail" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>No PO</th>
                <th>Lokasi</th>
                <th class="has-text-right">Jumlah Produk</th>
                <th class="has-text-right">Realisasi</th>
                <th class="has-text-right">% Realisasi</th>
            </tr>
            <tr>
                <td>PO-2019-0115</td>
                <td>Kalike</td>
                <td class="has-text-right">5</td>
                <td class="has-text-right">4</td>
                <td class="has-text-right">80%</td>
            </tr>
            <tr>
                <td>PO-2019-0115</td>
                <td>Wulublolong</td>
                <td class="has-text-right">2</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">70%</td>
            </tr>
            <tr>
                <td>PO-2019-0116</td>
                <td>Lebao</td>
                <td class="has-text-right">19</td>
                <td class="has-text-right">17</td>
                <td class="has-text-right">10%</td>
            </tr>
            <tr>
                <td>PO-2019-0116</td>
                <td>Lemawai</td>
                <td class="has-text-right">10</td>
                <td class="has-text-right">5</td>
                <td class="has-text-right">35%</td>
            </tr>
            <tr>
                <td>PO-2019-0117</td>
                <td>Watanhura</td>
                <td class="has-text-right">15</td>
                <td class="has-text-right">14</td>
                <td class="has-text-right">30%</td>
            </tr>
            <tr>
                <td>PO-2019-0117</td>
                <td>Duntana</td>
                <td class="has-text-right">12</td>
                <td class="has-text-right">15</td>
                <td class="has-text-right">50%</td>
            </tr>
            <tr>
                <td>PO-2019-0118</td>
                <td>Bubuatagamu</td>
                <td class="has-text-right">9</td>
                <td class="has-text-right">8</td>
                <td class="has-text-right">10%</td>
            </tr>
            <tr>
                <td>PO-2019-0118</td>
                <td>Kalike</td>
                <td class="has-text-right">10</td>
                <td class="has-text-right">8</td>
                <td class="has-text-right">20%</td>
            </tr>
            <tr>
                <td>PO-2019-0119</td>
                <td>Kalike</td>
                <td class="has-text-right">20</td>
                <td class="has-text-right">8</td>
                <td class="has-text-right">45%</td>
            </tr>
            <tr>
                <td>PO-2019-0119</td>
                <td>Kalike</td>
                <td class="has-text-right">2</td>
                <td class="has-text-right">3</td>
                <td class="has-text-right">10%</td>
            </tr>
            <tr>
                <td>PO-2019-0120</td>
                <td>Kalike</td>
                <td class="has-text-right">5</td>
                <td class="has-text-right">8</td>
                <td class="has-text-right">50%</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('custom-js')
    <script src="/js/lokasi/realisasiProduksiPerLokasi.js"></script>
@endsection