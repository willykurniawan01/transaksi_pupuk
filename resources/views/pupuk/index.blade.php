@extends('layouts.app')
@section('title',"Pupuk")
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
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#pupukModal">
                                    <i class="bi bi-plus-square"></i> Pupuk
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table id="pupukTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Pupuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pupuk as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <form method="POST" action="{{ route("pupuk.destroy",$item->id) }}">
                                                            @csrf
                                                            @method("delete")
                                                            <button class="btn btn-danger" type="submit">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
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

    <!-- Modal -->
<form action="{{ route("pupuk.store") }}" method="post">
@csrf
<div class="modal fade" id="pupukModal" tabindex="-1" aria-labelledby="pupukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="pupukModalLabel"></h5> --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" id="kode" name="kode" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama">Nama Pupuk</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#pupukTable').DataTable();
        });
    </script>
@endpush