@extends('admin.dashboard')
@section('admin-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo_path)) ?
                                    url('uploads/profiles/admin'.$profileData->photo_path) :
                                    url('uploads/profiles/no-profile.png') }}" alt="profile"
                                >
                                <span class="h4 ms-3">{{ (!empty($profileData->username)) ?
                                    $profileData->username : $profileData->email }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ (!empty($profileData->first_name && $profileData->last_name)) ?
                                    $profileData->first_name." ".$profileData->last_name  : $profileData->username }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ (!empty($profileData->email)) ?
                                $profileData->email : "N/A" }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ (!empty($profileData->phone)) ?
                                $profileData->phone : "N/A" }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ (!empty($profileData->address)) ?
                                $profileData->address : "N/A" }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted">{{ (!empty($profileData->current_at)) ?
                                $profileData->current_at : "N/A" }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="#" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="#" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="mail"></i>
                            </a>
                            <a href="#" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Admin  Profile</h6>

                            <form method="POST" action="{{ route('admin.profile.update') }}" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->username }}" disabled>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputFirstName1" class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="exampleInputFirstName1" autocomplete="off" value="{{ $profileData->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputLastName1" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="exampleInputLastName1" autocomplete="off" value="{{ $profileData->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $profileData->email }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPhone1" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone_number" id="exampleInputPhone1" autocomplete="off" value="{{ $profileData->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputAddress1" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" id="exampleInputAddress1" autocomplete="off" value="{{ $profileData->address }}">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-2 my-auto">
                                            <div class="mb-3">
                                                <label class="form-label" for="photo_path">Photo:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <img id="showImage" src="{{ (!empty($profileData->photo_path)) ? url('uploads/profiles/admin'.
                                                    $profileData->photo_path) : url('uploads/profiles/no-profile.png') }}"
                                                    alt="profile" class="wd-80 rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" name="photo_path" type="file" id="image">
                                </div>
                                <button type="submit" class="btn btn-success me-2">Update Profile</button>
                                <button class="btn btn-danger">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
