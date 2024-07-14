@extends('admin.dashboard')
@section('admin-content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <a href="{{ route('roles.create') }}" class="me-4 btn btn-inverse-success">Add Roles</a>
                        <a href="#dataTableExample" class="me-4 btn btn-inverse-info">All Roles</a>
                    </ol>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb text-end">
                        <a href="{{ route('roles.import') }}" class="me-4 btn btn-inverse-warning">Import</a>
                        <a href="{{ route('roles.export') }}" class="me-4 btn btn-inverse-danger">Export</a>
                    </ol>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Role Name</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>{{ $role->updated_at }}</td>

                                        <td>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="me-4 btn btn-inverse-info">Edit</a>
                                            <a href="{{ route('roles.delete', $role->id) }}" class="btn btn-inverse-danger">Delete</a>
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

@endsection
