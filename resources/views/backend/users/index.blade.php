@extends('admin.dashboard')
@section('admin-content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="" class="me-4 btn btn-inverse-success">Add New User</a>
                <a href="" class="me-4 btn btn-inverse-info">All Users</a>
            </ol>
        </nav>

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="" class="me-4 btn btn-inverse-light">Administrators</a>
                <a href="" class="me-4 btn btn-inverse-light">Domestic Workers</a>
                <a href="" class="me-4 btn btn-inverse-light">Home Owners</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Users Table</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Job No.</th>
                                    <th>Job Name</th>
                                    <th>Job Image</th>
                                    <th>Job Description</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($serviceTypes as $serviceType)
                                    <tr>
                                        <td>{{ $serviceType->id }}</td>
                                        <td>{{ $serviceType->name }}</td>
                                        <td>{{ $serviceType->image }}</td>
                                        <td>{{ $serviceType->description }}</td>
                                        <td>{{ $serviceType->created_at }}</td>
                                        <td>{{ $serviceType->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('service-type.edit', $serviceType->id) }}" class="btn btn-inverse-warning">Edit</a>
                                            <a href="{{ route('service-type.destroy', $serviceType->id) }}" class="btn btn-inverse-danger">Delete</a>
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
