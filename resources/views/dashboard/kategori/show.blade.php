@extends('dashboard.main')

@section('content')
    <div class="row p-1">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kategoris.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nama Kategori:</strong>
                        {{ $kategori->nama_kategori }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Foto:</strong>
                        <img src="{{ Storage::url('kategori/' . $kategori->foto) }}" class="img-fluid" alt="Category Image" style="max-width: 100%; max-height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
