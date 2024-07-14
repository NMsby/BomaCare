<style>
    .nav .sub-menu {
        list-style-type: none;
        padding-left: 0;

    }
</style>

<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <span>Boma</span>Care<span>™</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>


            @if(Auth::user()->can('view administrator menu'))
            <li class="nav-item nav-category">Manage Users</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="users">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Administrators</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="admin">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('administrators.create') }}" class="nav-link">
{{--                                <i class="link-icon" data-feather="user-plus"></i>--}}
                                Add Administrator
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
{{--                                <i class="link-icon" data-feather="user-check"></i>--}}
                                Verify Administrators
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('administrators.index') }}" class="nav-link">
{{--                                <i class="link-icon" data-feather="users"></i>--}}
                                View Administrators
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#workers" role="button" aria-expanded="false" aria-controls="users">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Domestic Workers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="workers">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="user-plus"></i>--}}
                                Add Domestic Worker
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="user-check"></i>--}}
                                Verify Domestic Workers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="users"></i>--}}
                                View Domestic Workers
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#owners" role="button" aria-expanded="false" aria-controls="users">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Home Owners</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="owners">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="user-plus"></i>--}}
                                Add Home Owner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="user-check"></i>--}}
                                Verify Home Owners
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="users"></i>--}}
                                View Home Owners
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#staff" role="button" aria-expanded="false" aria-controls="users">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Staff</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="staff">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="user-plus"></i>--}}
                                Add Staff
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="user-check"></i>--}}
                                Verify Staff
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{--                                <i class="link-icon" data-feather="users"></i>--}}
                                View Staff
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Services</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#jobs" role="button" aria-expanded="false" aria-controls="jobs">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                        <span class="link-title">Jobs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="jobs">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('service-type.create') }}" class="nav-link">
{{--                                <i class="link-icon" data-feather=""></i>--}}
                                Add Jobs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service-type.index') }}" class="nav-link">
{{--                                <i class="link-icon" data-feather="user-check"></i>--}}
                                View Jobs
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#payments" role="button" aria-expanded="false" aria-controls="payments">
                    <i class="link-icon" data-feather="credit-card"></i>
                    <span class="link-title ">Payments</span>
                    <i class="link-arrow " data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="payments">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">View Payments</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Pending Payments</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Completed Payments</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Authentication</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="roles">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Roles</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="roles">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">View Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}" class="nav-link">Add Role</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role-user.index') }}" class="nav-link">Assign Role to User</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#permissions" role="button" aria-expanded="false" aria-controls="permissions">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Permissions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="permissions">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">View Permissions</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.create') }}" class="nav-link">Add Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Assign Permission to User</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#rolePermissions" role="button" aria-expanded="false" aria-controls="rolePermissions">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Role Permissions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="rolePermissions">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('role-permissions.create') }}" class="nav-link">Assign Permission to Role</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role-permissions.index') }}" class="nav-link">View Role Permissions</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Feedback</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#feedback" role="button" aria-expanded="false" aria-controls="feedback">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title ">Reviews</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="feedback">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">View Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Handled Reviews</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#complaints" role="button" aria-expanded="false" aria-controls="complains">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title ">Complaints</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="complaints">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">View Complaints</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Handled Complaints</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Reports</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
                    <i class="link-icon" data-feather="bar-chart-2"></i>
                    <span class="link-title ">Statistics</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="reports">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Domestic Workers</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Home Owners</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Staff</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Complains</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Account</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#profile" role="button" aria-expanded="false" aria-controls="profile">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Profile</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="profile">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.profile') }}" class="nav-link">View Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.profile.change-password') }}" class="nav-link">Change Password</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Settings</li>
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">General</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Security</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Privacy</a>
                </li>
            </ul>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://github.com/NMsby/BomaCare" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
