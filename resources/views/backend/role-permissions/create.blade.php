@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content" id="page">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="#page" class="me-4 btn btn-inverse-success">Assign Permission to Role</a>
                <a href="{{ route('roles.index') }}" class="me-4 btn btn-inverse-info">All Roles</a>
            </ol>
        </nav>

        <div class="row profile-body mb-4">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Assign Permission to Role</h4>
                            <form class="forms-sample" method="post" action="{{ route('role-permissions.store') }}">
                                @csrf
                                <div class="form-group row my-3">
                                    <label for="role_name" class="col-sm-3 col-form-label">Role Name</label>
                                    <div class="col-6">
                                        <select name="role_id" id="role_id" class="form-control" required>
                                            <option selected="" disabled="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-check col-6 me-4 my-4">
                                        <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                        <label class="form-check-label" for="checkDefault">All Permissions</label>
                                    </div>
                                </div>
                                <hr>
                                @foreach($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input checkGroup" id="checkDefault">
                                                <label class="form-check-label" for="checkDefault">
                                                    {{ $group->group_name }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            @php
                                            $permissions = App\Models\User::getPermissionsByGroupName($group->group_name);
                                            @endphp

                                            @foreach($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" name="permission[]"
                                                           id="checkDefault {{ $permission->id }}" value="{{ $permission->id }}">
                                                    <label class="form-check-label" for="checkDefault {{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-inverse-success mr-2">Assign Permission</button>
                                <button type="reset" class="btn btn-inverse-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkDefaultmain').click(function () {
                if ($(this).is(':checked')) {
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    $('input[type=checkbox]').prop('checked', false);
                }
            });

            $('.checkGroup').click(function () {
                $(this).parent().parent().next().find('input[type=checkbox]').prop('checked', this.checked);
            });
        });
    </script>

@endsection

