@extends('layouts.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Obat</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="my-2">
            <a href="{{ url('/obat/create') }}" class="mb-3 btn btn-success">Tambah Obat Disini</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jenis Obat</th>
                <th scope="col">Dosis Kerja</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($obat) > 0)
                @foreach($obat as $i => $obat)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->jenis }}</td>
                        <td>{{ $obat->dosis }}</td>
                        <td>{{ $obat->harga }}</td>
                        {{--Tombol edit dan delete--}}
                        <td class="d-flex">
                            <a href="{{ url('/obat/' . $obat->id . '/edit') }}"
                               class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ url('/obat/' . $obat->id) }}">
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
