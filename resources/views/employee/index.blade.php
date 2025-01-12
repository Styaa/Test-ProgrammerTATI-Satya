@extends('layouts.user_type.auth')

@section('content')
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama Pegawai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $pegawai)
                        <tr>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm"><a
                                        href="{{ route('pegawai.show', $pegawai->id) }}">{{ $pegawai->nama }}</a></h6>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
