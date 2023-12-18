@extends('dashboard.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Create New Craft</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('kerajinans.index') }}"> Back </a>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('kerajinans.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="materials">Materials:</label>
                                    <input type="text" name="bahan_bahan" class="form-control" placeholder="Materials">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="steps">Steps:</label>
                                    <textarea name="langkah_langkah" class="form-control" placeholder="Steps"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="deskripsi" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <select name="id_kategori" id="category_id" class="form-control">
                                        @foreach($category as $categorys)
                                            <option value="{{ $categorys->id }}">{{ $categorys->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="photos">Photos:</label>
                                    <input type="file" name="foto[]" multiple class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection
