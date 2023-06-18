@extends('v1.layout.app')

@section('title', 'product')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            {{ __('produk') }}
                        </div>

                        <div class="float-end">
                            <a href="{{ route('create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($data as $dt)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dt->name }}</td>
                                            <td>{!! $dt->price !!}</td>
                                            <td>
                                                <form action="{{ route('destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('edit', $dt->id) }}"
                                                        class="btn btn-sm btn-outline-success">Edit</a> |
                                                    <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                        class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Data data belum Tersedia.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                @if (session('msg'))
                    <div class="alert alert-success mt-5">
                        <p>{{ session('msg') }}</p>
                    </div>
                @endif
            </div>


        </div>
    </div>

@endsection
