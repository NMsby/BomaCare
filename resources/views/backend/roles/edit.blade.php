@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content" id="page">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="#page" class="me-4 btn btn-inverse-success">Edit Role</a>
                <a href="{{ route('roles.index') }}" class="me-4 btn btn-inverse-info">All Roles</a>
            </ol>
        </nav>

        <div class="row profile-body mb-4">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Edit Role</h4>
                            <form class="forms-sample" method="post" action="{{ route('roles.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                <div class="form-group row my-3">
                                    <label for="role_name" class="col-sm-3 col-form-label">Role Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->name }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-inverse-success mr-2">Update Role</button>
                                <button type="reset" class="btn btn-inverse-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
