@extends('dashboard.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h4>Category Management</h4>
                                        </div>
                                        <div class="col-lg-2 text-right">
                                            <a class="btn btn-success text-white" href="{{ route('kategoris.create') }}">Create Category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $categ)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $categ->nama_kategori }}</td>
                                            <td>
                                                <img src="{{ Storage::url('kategori/' . $categ->foto) }}" class="img-fluid" alt="Responsive Image" style="max-width: 200px; max-height: 150px;">
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('kategoris.show', $categ->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('kategoris.edit', $categ->id) }}">Edit</a>
                                                <form action="{{ route('kategoris.destroy', $categ->id) }}" method="POST"
                                                    onclick="return confirm('Yakin Untuk Mengapus Data ?')" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
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
    {{-- {!! $data->render() !!} --}}
@endsection
