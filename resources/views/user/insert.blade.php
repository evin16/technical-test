@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form Insert Data') }}</div>
                <div class="d-grid">
                    <a href="{{route('user.show')}}">
                        <button class="w-auto btn btn-secondary btn-sm m-1">Back</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Nama Asset</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nama tempat">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Titik Koordinat</label>
                                        <textarea class="form-control" rows="3" placeholder="[x1,y1],[x2,y2],[xn,yn]" name="titik"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="file" name="image" placeholder="Upload image" id="image">
                                        @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection