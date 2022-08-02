@extends('layouts.app')
@section('title',"Transaksi")
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <a class="btn btn-success btn-sm" href="{{ route("transaksi.create") }}">
                                    <i class="bi bi-plus-square"></i> Transaksi
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table id="transaksiTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Pupuk</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Kode KB</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->pupuk->nama ?? "-" }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->kode_kb }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <form method="POST" action="{{ route("transaksi.destroy",$item->id) }}">
                                                                @csrf
                                                                @method("delete")
                                                                <button class="btn btn-danger" type="submit">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                                <a class="btn btn-success" href="{{ route("transaksi.edit",$item->id) }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>    
                                            @endforeach
                                        </tbody>
                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#transaksiTable').DataTable();
        });
    </script>
@endpush