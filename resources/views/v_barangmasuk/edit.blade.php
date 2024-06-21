@extends('layouts.adm-main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangmasuk.update',$rsetBarangMasuk->id) }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" value="{{ old('tgl_masuk',$rsetBarangMasuk->tgl_masuk) }}" placeholder="Masukkan Nama Siswa">
                            
                                <!-- error message untuk nama -->
                                @error('tgl_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Quantity</label>
                                <input type="text" class="form-control @error('qty_masuk') is-invalid @enderror" name="qty_masuk" value="{{ old('qty_masuk',$rsetBarangMasuk->qty_masuk) }}" placeholder="Masukkan Nomor Induk Siswa">
                            
                                <!-- error message untuk qty_masuk -->
                                @error('qty_masuk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Barang</label>
                                <select class="form-control @error('barang_id') is-invalid @enderror" name="barang_id">
                                    <option value="">Pilih Barang</option>
                                    @foreach($barangID as $barang)
                                        <option value="{{ $barang->id }}" {{ old('barang_id', $rsetBarangMasuk->barang_id) == $barang->id ? 'selected' : '' }}>{{ $barang->merk }} {{ $barang->seri }} || Stok : {{ $barang->stok }}</option>
                                    @endforeach
                                </select>

                                @error('barang_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>

 

            </div>
        </div>
    </div>
@endsection