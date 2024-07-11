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
                                    url($profileData->photo_path) :
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
                            <p class="text-muted">{{ (!empty(($profileData->phone_number) )) ?
                                $profileData->phone_number : "N/A" }}</p>
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

                            <h6 class="card-title">Admin Change Password</h6>

                            <form id="profile-update-password" method="POST" action="{{ route('admin.profile.update-password') }}" class="forms-sample">
                                @csrf
                                <div class="mb-3">
                                    <label for="oldPassword" class="form-label">Old Password</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPassword" name="old_password">
                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPassword" name="new_password">
                                    @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-success me-2">Change Password</button>
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
