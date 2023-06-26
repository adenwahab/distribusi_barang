@extends('admin.index')
@section('content')
<!-- <div class="container-fluid px-4"> -->
<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h1 class="mt-4">Daftar Transaksi</h1>
            @if ($message = Session::get('success'))
            <div class="alert alert-success" hidden>
                <p id='message'>{{ $message }}</p>
            </div>
            <script>
                Swal.fire({
                    title: 'Success',
                    text: $('#message').text(),
                    icon: 'Success',
                    confirmButtonText: 'Oke!'
                })
            </script>
            @endif
            <br />
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah</a>
            <div class="table-responsive">
                <table class="table table-hover" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($ar_transaksi as $trs )
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $trs->kode }} - {{$trs->barang}}</td>
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
                            <td>
                                <form id='deleteForm' method="POST" action="{{ route('transaksi.destroy', $trs->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning btn-sm" href="{{ route('transaksi.edit', $trs->id) }}" title="Ubah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if (Auth::user()->level == 'admin')
                                    <!-- hapus data -->
                                    <button class="btn btn-danger btn-sm delete-confirm" onclick="showConfirmationDialog(event)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @endif
                                    <input type="hidden" name="idx" value="" />
                                </form>
                            </td>
                        </tr>
                        @php $no++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ url('/transaksi-pdf') }}" class="btn btn-primary">Cetak PDF</a>
            <!-- <a href="{{ url('/transaksi-excel') }}" class="btn btn-primary">Cetak Excel</a> -->
        </div>
    </div>
</div>
<!-- </div> -->
<script>
    function showConfirmationDialog(e) {
        e = e || window.event;
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('afkar ganteng')
                // Trigger the form submission to delete the record
                document.getElementById('deleteForm').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User canceled the action, show a message or redirect as needed
                Swal.fire('Cancelled', 'Your imaginary file is safe :)', 'error');
            }
        });
    }
</script>
@endsection
