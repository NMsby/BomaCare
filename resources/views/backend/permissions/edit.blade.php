@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content" id="page">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="#page" class="me-4 btn btn-inverse-success">Edit Permission</a>
                <a href="{{ route('permissions.index') }}" class="me-4 btn btn-inverse-info">All Permissions</a>
            </ol>
        </nav>

        <div class="row profile-body mb-4">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Edit Permission</h4>
                            <form class="forms-sample" method="post" action="{{ route('permissions.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{ $permission->id }}">
                                <div class="form-group row my-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Group Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="group_name" name="group_name">
                                            <option selected="" disabled="">Select Group Name</option>
                                            <option value="administrator" {{ $permission->group_name == 'administrator' ? 'selected' : '' }}>Administrator</option>
                                            <option value="domesticworker" {{ $permission->group_name == 'domesticworker' ? 'selected' : '' }}>Domestic Worker</option>
                                            <option value="homeowner" {{ $permission->group_name == 'homeowner' ? 'selected' : '' }}>Home Owner</option>
                                            <option value="staff" {{ $permission->group_name == 'staff' ? 'selected' : '' }}>Staff</option>
                                            <option value="services" {{ $permission->group_name == 'services' ? 'selected' : '' }}>Services</option>
                                            <option value="jobs" {{ $permission->group_name == 'jobs' ? 'selected' : '' }}>Jobs</option>
                                            <option value="payments" {{ $permission->group_name == 'payments' ? 'selected' : '' }}>Payments</option>
                                            <option value="reviews" {{ $permission->group_name == 'reviews' ? 'selected' : '' }}>Reviews</option>
                                            <option value="complaints" {{ $permission->group_name == 'complaints' ? 'selected' : '' }}>Complaints</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="permission_name" class="col-sm-3 col-form-label">Permission Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="permission_name" name="permission_name" value="{{ $permission->name }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-inverse-success mr-2">Update Permission</button>
                                <button type="reset" class="btn btn-inverse-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
