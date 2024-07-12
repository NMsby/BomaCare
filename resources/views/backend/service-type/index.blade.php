@extends('admin.dashboard')
@section('admin-content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('service-type.create') }}" class="me-4 btn btn-inverse-success">Add New Job</a>
                <a href="#" class="me-4 btn btn-inverse-info">All Jobs</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Job Table</h6>
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
                                        <td>{{ $serviceType->{'service-type_name'} }}</td>
                                        <td>
                                            <img src="{{ (!empty($serviceType->{'service-type_image'})) ? url('uploads/service-types/'.$serviceType->{'service-type_image'}) : url('uploads/service-types/no-image.png') }}" alt="image" class="">
                                        </td>
                                        <td>
                                            {{ $serviceType->{'service-type_description'} }}
                                        </td>
                                        <td>{{ $serviceType->created_at->diffForHumans() }}</td>
                                        <td>{{ $serviceType->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('service-type.edit', $serviceType->id) }}" class="btn btn-inverse-warning">Edit</a>
                                            <a href="{{ route('service-type.delete', $serviceType->id) }}" class="btn btn-inverse-danger">Delete</a>
                                            <a href="{{ route('service-type.show', $serviceType->id) }}" class="btn btn-inverse-info">View</a>
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
