@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Helloworld Function</h1>

        <!-- Form untuk input nilai n -->
        <form action="{{ route('helloworld.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="n" class="form-label">Masukkan Nilai n</label>
                <input type="number" name="n" id="n" class="form-control" value="{{ old('n') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Proses</button>
        </form>

        <!-- Tampilkan Output -->
        @isset($output)
            <div class="mt-4">
                <h4>Output untuk n = {{ $n }}:</h4>
                <p>{{ $output }}</p>
            </div>
        @endisset

        <!-- Tampilkan Validasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
