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

                    <h5 class="card-title">Layanan Monitoring Aset PT. Nikel Sejahtera</h5>
                    <a href="{{route('user.show')}}" class="btn btn-primary">Details</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection