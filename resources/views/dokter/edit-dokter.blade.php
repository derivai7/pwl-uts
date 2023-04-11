@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Dokter</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <form method="post" action="{{ url('dokter/' . $doctor->id) }}">
                @method('put')
                @csrf
                <div class="card-header">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror"
                               value="{{ $doctor->nama }}" id="nama" name="nama"
                               type="text"/>
                        @error('nama')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <input class="form-control @error('spesialis') is-invalid @enderror"
                               value="{{ $doctor->spesialis }}" id="spesialis"
                               name="spesialis" type="text"/>
                        @error('spesialis')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Pengalaman (tahun)</label>
                        <input class="form-control @error('pengalaman') is-invalid @enderror"
                               value="{{ $doctor->pengalaman }}" id="pengalaman"
                               name="pengalaman" type="text"/>
                        @error('pengalaman')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control @error('alamat') is-invalid @enderror"
                               value="{{ $doctor->alamat }}" id="alamat" name="alamat"
                               type="text"/>
                        @error('alamat')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input class="form-control @error('nomor_telepon') is-invalid @enderror"
                               value="{{ $doctor->nomor_telepon }}"
                               id="nomor_telepon"
                               name="nomor_telepon"
                               type="text"/>
                        @error('nomor_telepon')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>

        </div>
        <!-- Content -->

        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
