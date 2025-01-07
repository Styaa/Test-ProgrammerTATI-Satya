@extends('layouts.user_type.auth')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h5 class="">Verifikasi Log Harian Pegawai</h5>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Pegawai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tanggal</th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Kegiatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $logHarian)
                            <tr>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-sm">{{ $logHarian->pegawai->nama }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-sm">{{ $logHarian->tanggal }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class=" font-weight-bold"> {{ $logHarian->kegiatan }} </h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class=" font-weight-bold"> {{ $logHarian->status }} </h6>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="ms-auto">
                                        <!-- Tombol Terima -->
                                        <a class="btn btn-link text-success px-3 mb-0"
                                            href="{{ route('log-harian.approve', $logHarian->id) }}">
                                            <i class="fas fa-pencil-alt text-success me-2" aria-hidden="true"></i>Terima
                                        </a>

                                        <!-- Tombol Tolak -->
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                            href="{{ route('log-harian.reject', $logHarian->id) }}">
                                            <i class="far fa-trash-alt me-2"></i>Tolak
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
