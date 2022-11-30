@extends('template')

@section('content')
    {{-- membuat tabel view produk --}}

    <div class="container mt-3">
        <a href="{{ url('produk/create') }}" class="btn btn-primary">Tambah Produk</a>
        <div class="card shadow mb-3 mt-3">
            <div class="card-header text-center">Produk</div>
            <div class="card-body">
                <table class="table-responsive">
                    <table class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['nama'] }}</td>
                                    <td><img src="{{ asset('storage/' . $item->foto) }}" width="100px"></td>
                                    <td>{{ $item['harga'] }}</td>
                                    <td>{{ $item['descpro'] }}</td>
                                    <td>{{ $item->kategori->nama }}</td>
                                    <td><a href="{{ url('produk/' . $item->id . '/edit') }}"class="btn btn-primary">Edit</a>
                                        <a href="{{ url('produk/' . $item->id . '/delete') }}"class="btn btn-secondary">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endsection
