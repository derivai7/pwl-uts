@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Obat</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <form method="post" action="{{ url('obat') }}">
                @csrf
                <div class="card-header">
                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input class="form-control @error('nama_obat') is-invalid @enderror"
                               value="{{ old('nama_obat') }}" id="nama_obat" name="nama_obat" type="text"/>
                        @error('nama_obat')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Obat</label>
                        <input class="form-control @error('jenis') is-invalid @enderror"
                               value="{{ old('jenis') }}" id="jenis" name="jenis" type="text"/>
                        @error('jenis')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dosis" class="form-label">Dosis</label>
                        <input class="form-control @error('dosis') is-invalid @enderror"
                               value="{{ old('dosis') }}" id="dosis" name="dosis" type="text"/>
                        @error('dosis')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input class="form-control @error('harga') is-invalid @enderror"
                               value="{{ old('harga') }}" id="harga" name="harga" type="text"/>
                        @error('harga')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>

        </div>
        <!-- Content -->

        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
