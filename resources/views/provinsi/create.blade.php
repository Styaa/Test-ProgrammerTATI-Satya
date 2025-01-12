@extends('layouts.user_type.guest')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Edit Provinsi</h3>
                                    {{-- <p class="mb-0">Create a new acount<br></p>
                                <p class="mb-0">OR Sign in with these credentials:</p>
                                <p class="mb-0">Email <b>admin@softui.com</b></p>
                                <p class="mb-0">Password <b>secret</b></p> --}}
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('provinsi.store') }}">
                                        @csrf
                                        @method('POST')
                                        <label>Nama</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name" id="email"
                                                placeholder="Name" value="" aria-label="Name"
                                                aria-describedby="email-addon">
                                            {{-- @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                        <label>Kode</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="code" id="code"
                                                placeholder="Code" value="" aria-label="Code"
                                                aria-describedby="password-addon">
                                            {{-- @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Tambah
                                                Provinsi</button>
                                            <a href="{{ route('provinsi.index') }}"
                                                class="btn btn-primary w-100 mt-4 mb-0">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
