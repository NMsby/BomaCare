@extends('admin.dashboard')
@section('admin-content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <h4 class="mb-1 text-center">All Roles and Permissions</h4>
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
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <span class="badge bg-danger">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('role-permissions.edit', $role->id) }}" class="btn btn-inverse-info">Edit</a>
                                            <a href="{{ route('role-permissions.delete', $role->id) }}" class="btn btn-inverse-danger">Delete</a>
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
