@extends('layouts.app')
@section('title',"Transaksi | Edit")
@push('style')
@endpush
@section('content')
<form action="{{ route("transaksi.update",$transaksi->id) }}" method="post">
    @csrf
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="text" id="kode" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ $transaksi->kode }}">
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jumlah">Pupuk</label>
                                    <div class="input-group">
                                        <select class="custom-select  @error('pupuk') is-invalid @enderror" name="pupuk">
                                          <option selected value="">Pilih...</option>
                                          @foreach ($pupuk as $item)
                                             <option {{ $transaksi->pupuk_id ==  $item->id ? "selected" : ""}} value="{{ $item->id }}">{{ $item->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    @error('pupuk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control  @error('jumlah') is-invalid @enderror" value="{{ $transaksi->jumlah }}">
                                    @error('jumlah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" id="tanggal" name="tanggal" class="form-control  @error('tanggal') is-invalid @enderror" value="{{ $transaksi->tanggal }}">
                                    @error('tanggal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mr-5" for="tanggal">Kode KB</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="kode_kb" {{ $transaksi->kode_kb == "SW" ? "checked" :"" }} type="radio" name="inlineRadioOptions" id="inlineRadio1" value="SW">
                                        <label class="form-check-label" for="inlineRadio1">SW</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="kode_kb" {{ $transaksi->kode_kb == "KB" ? "checked" :"" }} type="radio" name="inlineRadioOptions" id="inlineRadio2" value="KB">
                                        <label class="form-check-label" for="inlineRadio2">KB</label>
                                      </div>
                                      @error('kode_kb')
                                      <div class="row">
                                        <div class="col">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                      </div>
                                      @enderror
                                </div>
                            </div>
                        </div> 
                        
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success mr-2">
                                        Simpan
                                   </button> 
                                   <a href="{{ route("transaksi.index") }}" class="btn btn-primary">
                                        Kembali
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

