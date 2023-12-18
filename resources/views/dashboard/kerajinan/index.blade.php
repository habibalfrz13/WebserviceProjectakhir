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
                                            <h4>Kerajinan Management</h4>
                                        </div>
                                        <div class="col-lg-2 text-right">
                                            <a class="btn btn-success text-white" href="{{ route('kerajinans.create') }}">Create Craft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Username</th>
                                    <th>Kategori</th>
                                    <th>Foto</th>
                                    <th width="200px">Action</th>
                                </tr>
                                @foreach ($data as $craft)
                                @php
                                    $image = App\Models\FotoKerajinan::where('id_kerajinan', $craft->id)->first();
                                    // $kategori = App\Models\Kategori::where('id', $item->id_kategori)->first();
                                @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $craft->judul }}</td>
                                        <td>{{ $craft->user->username }}</td>
                                        <td>{{ $craft->id_kategori }}</td>
                                        <td> <img src="{{ Storage::url('kerajinan/' . $image->foto) }}" class="responsive-img"
                                            alt="Responsive Image"
                                            style="    width: 132px;
                                            height: 111px;">
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('kerajinans.show', $craft->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('kerajinans.edit', $craft->id) }}">Edit</a>
                                            <form action="{{ route('kerajinans.destroy', $craft->id) }}" method="POST"
                                                onclick="return confirm('Yakin Untuk Mengapus Data ?')" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {!! $data->render() !!} --}}
@endsection
