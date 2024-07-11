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
                                    <input type="text" class="form-control @error('service-type_name') is-invalid @enderror" id="service-type_name" name="service-type_name" placeholder="" autocomplete="off" required>
                                    @error('service-type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="service-type_description" class="form-label">Job Description</label>
                                    <textarea class="form-control @error('service-type_description') is-invalid @enderror" id="service-type_description" name="service-type_description" autocomplete="off" placeholder="" required></textarea>
                                    @error('service-type_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="service-type_price" class="form-label">Job Price</label>
                                    <input type="text" class="form-control @error('service-type_price') is-invalid @enderror" id="service-type_price" name="service-type_price" autocomplete="off" placeholder="" required>
                                    @error('service-type_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4 my-auto">
                                            <div class="mb-3">
                                                <label class="form-label" for="service-type_image">Job Image:</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <img id="showImage" src="{{ url('uploads/service-types/no-image.png') }}"
                                                     alt="service-type" class="wd-250">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control @error('service-type_image') is-invalid @enderror" name="service-type_image" type="file" id="image" required>
                                    @error('service-type_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

    <script type="text/javascript">function resetForm() {
            document.getElementById('profile-update').reset();
            $('#showImage').attr('src', "{{ url('uploads/profiles/no-profile.png') }}");
        }

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
