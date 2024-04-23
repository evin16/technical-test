@extends('layouts.app')

@section('content')
<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h3 class="card-title">Change Password</h3>
                <div class="panel-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }} mb-3">
                            <label for="new-password" class="col-md control-label small">Current Password</label>
                            <div class="col-md">
                                <input id="current-password" type="password" class="form-control"
                                    name="current-password" required>
                                @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} mb-3">
                            <label for="new-password" class="col-md control-label small">New Password</label>
                            <div class="col-md">
                                <input id="new-password" type="password" class="form-control" name="new-password"
                                    required>
                                @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="new-password-confirm" class="col-md control-label small">Confirm New
                                Password</label>
                            <div class="col-md">
                                <input id="new-password-confirm" type="password" class="form-control"
                                    name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md col-md-offset-4">
                                <button type="submit" class="btn btn-primary float-end">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection