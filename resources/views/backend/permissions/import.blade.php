@extends('admin.dashboard')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content" id="page">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('permissions.index') }}" class="me-4 btn btn-inverse-info">All Permissions</a>
                <a href="{{ route('permissions.export') }}" class="btn btn-inverse-danger">Download File (.xlsx)</a>
            </ol>
        </nav>

        <div class="row profile-body mb-4">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Import Permission</h4>
                            <form class="forms-sample" method="post" action="{{ route('permissions.store') }}">
                                @csrf
                                <div class="form-group row my-3">
                                    <label for="file" class="col-sm-3 col-form-label">File Import (.xlsx)</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="file" name="file" required>
                                    </div>
                                </div>
                                <button type="submit" class="me-4 btn btn-inverse-success mr-2">Upload</button>
                                <button type="reset" class="btn btn-inverse-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

