@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Nilai Kinerja Pegawai</h3>
                                    {{-- <p class="mb-0">Create a new acount<br></p>
                                <p class="mb-0">OR Sign in with these credentials:</p>
                                <p class="mb-0">Email <b>admin@softui.com</b></p>
                                <p class="mb-0">Password <b>secret</b></p> --}}
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('pegawai.storePredikat', $id) }}">
                                        @csrf
                                        @method('POST')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hasil_kerja"
                                                    class="form-control-label">{{ __('Hasil Kerja') }}</label>
                                                <div class="@error('hasil_kerja') border border-danger rounded-3 @enderror">
                                                    <select class="form-control" id="hasil_kerja" name="hasil_kerja">
                                                        <option value="" disabled selected>Pilih Hasil Kerja</option>
                                                        <option value="di bawah ekspektasi">
                                                            Di bawah ekspektasi
                                                        </option>
                                                        <option value="sesuai ekspektasi">
                                                            Sesuai ekspektasi
                                                        </option>
                                                        <option value="di atas ekspektasi">
                                                            Di atas ekspektasi
                                                        </option>
                                                    </select>
                                                    @error('hasil_kerja')
                                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="perilaku"
                                                    class="form-control-label">{{ __('Perilaku Pegawai') }}</label>
                                                <div class="@error('perilaku') border border-danger rounded-3 @enderror">
                                                    <select class="form-control" id="perilaku" name="perilaku">
                                                        <option value="" disabled selected>Pilih Perilaku</option>
                                                        <option value="di bawah ekspektasi">
                                                            Di bawah ekspektasi
                                                        </option>
                                                        <option value="sesuai ekspektasi">
                                                            Sesuai ekspektasi
                                                        </option>
                                                        <option value="di atas ekspektasi">
                                                            Di atas ekspektasi
                                                        </option>
                                                    </select>
                                                    @error('perilaku')
                                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Nilai
                                                Pegawai</button>
                                            <a href="{{ route('pegawai.index') }}"
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
