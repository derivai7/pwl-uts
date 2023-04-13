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
        <div class="row my-2">
            <div class="col-8">
                <a href="{{ url('obat/create') }}" class="mb-3 btn btn-success">Tambah Obat Disini</a>
            </div>
            <form class="col-4" action="{{ url('obat') }}" method="GET">
                <div class="input-group">
                    <label for="keyword"></label>
                    <input type="text" class="form-control" placeholder="Cari..." id="keyword" name="keyword"
                           value="{{ $_GET['keyword'] ?? '' }}">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Kode Obat</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jenis Obat</th>
                <th scope="col">Dosis Kerja</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($obat) > 0)
                @foreach($obat as $i => $o)
                    <tr>
                        <td>B010{{ $o->id }}</td>
                        <td>{{ $o->nama_obat }}</td>
                        <td>{{ $o->jenis }}</td>
                        <td>{{ $o->dosis }}</td>
                        <td>{{ $o->harga }}</td>
                        {{--Tombol edit dan delete--}}
                        <td class="d-flex">
                            <a href="{{ url('/obat/' . $o->id . '/edit') }}"
                               class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ url('/obat/' . $o->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn btn-sm btn-danger">
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
        <div class="d-flex justify-content-end">
            {!! $obat->links() !!}
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    </section>
    <!-- /.content -->
@endsection
