@extends('admin.dashboard')
@section('admin-content')

    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }
    </style>

    <div class="page-content center-content">
        <div class="lockscreen-wrapper">
            <div class="lockscreen-box">
                <div class="lockscreen border-radius-10">
                    <div class="lockscreen text-center">
                        <div class="lockscreen-logo">
                            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('uploads/logo/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="lockscreen user-name">
                            <h5>{{ $profileData->username }}</h5>
                        </div>
                        <div class="lockscreen user-image">
                            <img class="wd-150 rounded-circle" src="{{ (!empty($profileData->photo_path)) ?
                                    url($profileData->photo_path) :
                                    url('uploads/profiles/no-profile.png') }}" alt="User Image">
                        </div>
                        <div class="lockscreen password-form">
                            <form method="POST" action="{{ route('admin.unlock-screen') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Unlock</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
