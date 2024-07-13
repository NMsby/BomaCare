@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content" id="page">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="#page" class="me-4 btn btn-inverse-success">Add Permission</a>
                <a href="{{ route('permissions.index') }}" class="me-4 btn btn-inverse-info">All Permissions</a>
            </ol>
        </nav>

        <div class="row profile-body mb-4">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Add Permission</h4>
                            <form class="forms-sample" method="post" action="{{ route('permissions.store') }}">
                                @csrf
                                <div class="form-group row my-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Group Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="group_name" name="group_name">
                                            <option selected="" disabled="">Select Group Name</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="domesticworker">Domestic Worker</option>
                                            <option value="homeowner">Home Owner</option>
                                            <option value="staff">Staff</option>
                                            <option value="services">Services</option>
                                            <option value="jobs">Jobs</option>
                                            <option value="payments">Payments</option>
                                            <option value="reviews">Reviews</option>
                                            <option value="complaints">Complaints</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <label for="permission_name" class="col-sm-3 col-form-label">Permission Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="permission_name" name="permission_name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-inverse-success mr-2">Add Permission</button>
                                <button type="reset" class="btn btn-inverse-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

