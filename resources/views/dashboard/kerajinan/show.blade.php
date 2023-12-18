@extends('dashboard.main')

@section('content')
    <div class="row p-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Kerajinan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kerajinans.index') w}}">Back</a>
            </div>
        </div>
    </div>

    <div class="card border-info shadow-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <strong>ID:</strong>
                        {{ $kerajinan->id }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>User ID:</strong>
                        {{ $kerajinan->id_user }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Kategori ID:</strong>
                        {{ $kerajinan->id_kategori }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Judul:</strong>
                        {{ $kerajinan->judul }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Bahan-bahan:</strong>
                        {{ $kerajinan->bahan_bahan ?: 'Not specified' }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Langkah-langkah:</strong>
                        {{ $kerajinan->langkah_langkah ?: 'Not specified' }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        {{ $kerajinan->deskripsi ?: 'Not specified' }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Foto Kerajinan:</strong>
                        @if(count($fotoKerajinan) > 0)
                            <div class="row">
                                @foreach($fotoKerajinan as $foto)
                                    <div class="col-md-3 mb-3">
                                        <img src="{{ Storage::url('kerajinan/' . $foto->foto) }}" alt="Foto Kerajinan" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No photos available</p>
                        @endif
                    </div>
                </div>

                <!-- Add more details as needed -->

                <div class="col-md-12 text-center">
                    <!-- Add more details or customize the display as needed -->
                </div>
            </div>
        </div>
    </div>
@endsection
