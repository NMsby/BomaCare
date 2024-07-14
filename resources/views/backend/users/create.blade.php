@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Add Administrator</h4>
                            <form id="myForm" class="forms-sample" method="post" action="{{ route('administrators.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-group mb-3 col-md-8">
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone_number" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="roles" class="form-label">Role</label>
                                    <select name="roles" id="roles" class="form-control">
                                        <option selected="" disabled="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--                                <div class="form-group mb-3">--}}
                                {{--                                    <label for="status" class="form-label">Status</label>--}}
                                {{--                                    <select name="status" id="status" class="form-control">--}}
                                {{--                                        <option selected="" disabled="">Select Status</option>--}}
                                {{--                                        <option value="1">Active</option>--}}
                                {{--                                        <option value="0">Inactive</option>--}}
                                {{--                                    </select>--}}
                                {{--                                </div>--}}
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
