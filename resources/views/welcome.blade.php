@extends('layouts.app')

@section('content')
<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="row justify-content-center align-items-center">
        <main class="col-md px-3 text-center">
            <h1>Sistem Digitalisasi Layanan Monitoring Aset <br> PT. Nikel Sejahtera</h1>
            <p class="lead">
                @if(Auth::user()->admin == '1')
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Dashboard</a>
                @elseif (Auth::user()->admin == '0')
                <a href="{{ route('user.index') }}" class="btn btn-primary">Dashboard</a>
                @endif
            </p>
            <footer class="mt-auto text-50">
                <p>&copy; 2024</p>
            </footer>
        </main>
    </div>
</div>
@endsection