<h3 align="center">Daftar Suplai Barang</h3>
                        <table border="1" align="center" cellpadding="10" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Barang Masuk</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($ar_suplai_barang as $data)
                        <tr>
                        <th>{{ $no }}</th>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->barang}}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->suplier }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->tgl }}</td>
                            <td>{{$data->keterangan}}</td>
                                </tr>
                                    @php $no++ @endphp
                                @endforeach
                            </tbody>
                        </table>