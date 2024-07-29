@extends('layouts.app')

@section('title', 'Tambah Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Admin</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Tambah Admin</h2>
                <div class="card">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text"
                                    class="form-control @error('username')
                                is-invalid
                            @enderror"
                                    name="username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
                                    name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')
                                is-invalid
                            @enderror"
                                        name="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Foto profil</label>
                                    <input type="file" id="photo" class="form-control" name="photo"
                                        @error('photo') is-invalid @enderror>
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>Preview Foto</label>
                                    <div class="card border">

                                        <div class="card-body">
                                            <img id="image-preview" src="{{ asset('img/preview-default.jpg') }}"
                                                alt="preview image"
                                                style="max-height: 250px;
                                                width: 100%;
                                                object-fit: cover;
                                                ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(e) {


            $('#photo').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
@endpush
