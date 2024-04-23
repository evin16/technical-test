@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are Admin') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center gap-2">
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sistem Layanan Peminjaman Aset</h5>
                    <a href="{{route('admin.show')}}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Layanan Aset</h5>
                    <a href="{{route('admin.vehicle')}}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Layanan Driver</h5>
                    <a href="{{route('admin.driver')}}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Layanan User</h5>
                    <a href="{{route('role.index')}}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection