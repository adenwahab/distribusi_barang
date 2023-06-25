<h3 align="center">Daftar Transaksi</h3>
<table border="1" align="center" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Pelanggan</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($ar_transaksi as $trs )
        <tr>
            <th>{{ $no }}</th>
            <td>{{ $trs->barang }}</td>
            <td>{{ $trs->pelanggan }}</td>
            @if ($trs->status == 1)
            <td>Member</td>
            @else
            <td>Bukan Member</td>
            @endif
            <td>{{ $trs->tgl }}</td>
            <td>{{ $trs->jumlah }}</td>
            <td>{{ $trs->keterangan }}</td>
            <td>Rp. {{ $trs->total_harga }}</td>
        </tr>
        @php $no++ @endphp
        @endforeach
    </tbody>
</table>