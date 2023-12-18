@extends('dashboard.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card mb-0 ">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <h5 class="card-title fw-semibold mb-4 d-inline">Pengaturan Hak Akses</h5>
                        </div>
                        @can('role-create')
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i>
                                    Tambah</a>
                            </div>
                        @endcan
                    </div>
                    <table class="table table-striped" style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="380px">Action</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('roles.show', $role->id) }}">Show</a>
                                            @can('role-edit')
                                                <a class="btn btn-sm  btn-primary"
                                                    href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm  btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
