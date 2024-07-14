@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <div class="page-content" id="page">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="#page" class="me-4 btn btn-inverse-info">All Roles</a>
                <a href="{{ route('administrators.create') }}" class="me-4 btn btn-inverse-success">Add Admin</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Administrators</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTableExample">
                                <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Role </th>
                                    <th> Status </th>
                                    <th> Change </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($administrators as $administrator)
                                    <tr>
                                        <td> {{ $administrator->id }} </td>
                                        <td >
                                            <img src="{{ (!empty($administrator->photo)) ?
                                                    url('storage/administrators/'.$administrator->photo) :
                                                    url('storage/administrators/no-image.png') }}" alt="image"
                                                 style="width: 70px; height: 40px;">
                                        </td>
                                        <td> {{ $administrator->name }} </td>
                                        <td> {{ $administrator->role }} </td>
                                        <td>
                                            @if($administrator->status == 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <input data-id="{{ $administrator->id }}" class="toggle-class" type="checkbox"
                                                   data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                   data-on="Active" data-off="Inactive" {{ $administrator->status == 'active' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <a href="{{ route('administrators.edit', $administrator->id) }}"
                                               class="btn btn-inverse-info btn-sm" title="Edit">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="{{ route('administrators.delete', $administrator->id) }}"
                                               class="btn btn-inverse-danger btn-sm delete" id="delete">
                                                <i data-feather="trash-2"></i>
                                            </a>
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
