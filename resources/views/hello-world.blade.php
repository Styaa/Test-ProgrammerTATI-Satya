@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <h1>Helloworld Function</h1>

        <form action="{{ route('helloworld.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="n" class="form-label">Masukkan Nilai n</label>
                <input type="number" name="n" id="n" class="form-control" value="{{ old('n') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Proses</button>
        </form>

        @isset($output)
            <div class="mt-4">
                <h4>Output untuk n = {{ $n }}:</h4>
                <p>{{ $output }}</p>
            </div>
        @endisset

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
