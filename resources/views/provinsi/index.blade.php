@extends('layouts.user_type.guest')

@section('content')
    <div class="card-body px-0 pb-2">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-secondary">Daftar Provinsi</h4>
            <a href="{{ route('provinsi.create') }}" class="btn bg-gradient-info">Add Provinsi</a>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama Provinsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Kode Provinsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($provinsis as $provinsi)
                        <tr>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-sm">{{ $provinsi->name }}</h6>
                            </td>
                            <td class="align-middle text-center">
                                <h6 class=" font-weight-bold"> {{ $provinsi->code }} </h6>
                            </td>
                            <td class="align-middle text-center">
                                <div class="ms-auto">
                                    <!-- Tombol Terima -->
                                    <a class="btn btn-link text-secondary px-3 mb-0"
                                        href="{{ route('provinsi.edit', ['provinsi' => $provinsi->id]) }}">
                                        <i class="fas fa-pencil-alt text-success me-2" aria-hidden="true"></i>Update
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('provinsi.destroy', ['provinsi' => $provinsi->id]) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="far fa-trash-alt me-2"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
