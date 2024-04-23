@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form Insert Data') }}</div>
                <div class="d-grid">
                    <a href="{{route('admin.show')}}">
                        <button class="w-auto btn btn-secondary btn-md m-3">Back</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex-row g-3">
                            <div class="row mb-3 g-3">
                                <div class="col">
                                    <label class="form-label fw-bold">Vehicle</label>
                                    <select class="form-select" name="vehicle" required>
                                        <option selected> </option>
                                        @foreach ($vehicle as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label fw-bold">Driver</label>
                                    <select class="form-select" name="driver" required>
                                        <option selected> </option>
                                        @foreach ($driver as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 g-3">
                                <div class="col">
                                    <label class="form-label fw-bold">Start</label>
                                    <input type="date" name="mulai" id="" class="form-control">
                                </div>
                                <div class="col">
                                    <label class="form-label fw-bold">Driver</label>
                                    <input type="date" name="selesai" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3 g-3">
                                <div class="col">
                                    <label class="form-label fw-bold">Approval</label>
                                    <select class="form-select" name="admin" required>
                                        <option selected> </option>
                                        @foreach ($admin as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
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