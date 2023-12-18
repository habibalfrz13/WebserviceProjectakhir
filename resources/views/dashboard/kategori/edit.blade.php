@extends('dashboard.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{ route('kategoris.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="col text-right">
                            <h4 class="card-title">Tambah Kategori</h4>
                            <p class="card-description">Daftar Kategori Kerajinan</p>
                        </div>
                    </div>

                    <div class="container">
                        <form action="{{ route('kategoris.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row mb-3">
                                <label class="col-form-label col-2 d-flex align-items-center">Foto</label>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-md" name="image" value="{{ $data->foto }}"accept="image/png, image/jpeg" required />
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-form-label col-2 d-flex align-items-center">Nama Kategori</label>
                                <div class="col-10">
                                    <input type="text" class="form-control form-control-md" name="kategori" value="{{ $data->nama_kategori }}"placeholder="Inputkan Type" value="{{ Session::get('kategori') }}" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-10 offset-2">
                                    <button type="submit" class="btn btn-warning">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
