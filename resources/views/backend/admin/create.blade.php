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

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="roles" class="form-label">Role</label>
                                    <select name="roles" id="roles" class="form-control">
                                        <option selected="" disabled="">Select Role</option>
                                        @foreach($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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

