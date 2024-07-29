@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Admin</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Admin</h2>
                <p class="section-lead">
                    Kamu bisa menambahkan, mengedit, dan menghapus admin di sini.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('users.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="py-2">
                                                    <a target="_blank"
                                                        href="
                                                    {{ $user->photo ? Storage::url($user->photo) : asset('img/preview-default.jpg') }}
                                                    "><img
                                                            alt="image"
                                                            src="{{ $user->photo ? Storage::url($user->photo) : asset('img/preview-default.jpg') }}"
                                                            class="
                                                        object-fit-cover border rounded"
                                                            width="100"></a>

                                                </td>
                                                <td>{{ $user->username }}</td>

                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>{{ $user->name }}
                                                </td>
                                                <td>
                                                    <div class="badge badge-pill badge-primary ">
                                                        {{ $user->role }}</div>

                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-start">
                                                        <a href='{{ route('users.edit', $user->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form
                                                            onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?');"
                                                            action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $users->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
