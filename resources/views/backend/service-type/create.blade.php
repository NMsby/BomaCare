@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Create a New Job</h6>

                            <form id="service-type-create" method="POST" action="{{ route('service-type.store') }}" class="forms-sample">
                                @csrf
                                <div class="mb-3">
                                    <label for="service-type_name" class="form-label">Job Name</label>
                                    <input type="text" class="form-control" id="service-type_name" name="service-type_name" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="service-type_description" class="form-label">Job Description</label>
                                    <textarea class="form-control" id="service-type_description" name="service-type_description" placeholder=""></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="service-type_image" class="form-label">Job Image</label>
                                    <input type="file" class="form-control" id="service-type_image" name="service-type_image">
                                </div>
                                <button type="submit" class="btn btn-success me-2">Save Changes</button>
                                <button class="btn btn-danger" onclick="resetForm()">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>

@endsection
