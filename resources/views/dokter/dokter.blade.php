@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Dokter</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="my-2">
            <a href="{{ url('/dokter/create') }}" class="mb-3 btn btn-success">Tambah Dokter Disini</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Pengalaman Kerja</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($doctors) > 0)
                @foreach($doctors as $i => $doctor)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $doctor->nama }}</td>
                        <td>{{ $doctor->spesialis }}</td>
                        <td>{{ $doctor->pengalaman }} Tahun</td>
                        <td>{{ $doctor->alamat }}</td>
                        <td>{{ $doctor->nomor_telepon }}</td>
                        {{--Tombol edit dan delete--}}
                        <td class="d-flex">
                            <a href="{{ url('/dokter/' . $doctor->id . '/edit') }}"
                               class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ url('/dokter/' . $doctor->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Data tidak ada</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- Content -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    </section>
    <!-- /.content -->
@endsection
