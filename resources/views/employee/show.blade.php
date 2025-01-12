@extends('layouts.user_type.auth')

@section('content')
    <div class="card-body px-0 pb-2">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-secondary">Daftar Penilaian Predikat Kinerja</h4>
            <a href="{{ route('pegawai.penilaian', $id) }}" class="btn bg-gradient-info">Nilai Pegawai</a>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama Pegawai</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tanggal Penilaian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Predikat Kinerja</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($performas as $performa)
                        <tr>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm">{{ $performa->pegawai->nama }}</h6>
                            </td>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm">{{ $performa->created_at->format('d-m-Y') }}</h6>
                            </td>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm">{{ $performa->predikat_kinerja }}</h6>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
