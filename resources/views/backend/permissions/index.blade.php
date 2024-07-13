@extends('admin.dashboard')
@section('admin-content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <a href="{{ route('permissions.create') }}" class="me-4 btn btn-inverse-success">Add Permission</a>
                        <a href="#dataTableExample" class="me-4 btn btn-inverse-info">All Permissions</a>
                    </ol>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb text-end">
                        <a href="{{ route('permissions.import') }}" class="me-4 btn btn-inverse-warning">Import</a>
                        <a href="{{ route('permissions.export') }}" class="me-4 btn btn-inverse-danger">Export</a>
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
                                    <th>Permission Name</th>
                                    <th>Group Name</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->group_name }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>{{ $permission->updated_at }}</td>

                                        <td>
                                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-inverse-info">Edit</a>
                                            <a href="{{ route('permissions.delete', $permission->id) }}" class="btn btn-inverse-danger">Delete</a>
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
