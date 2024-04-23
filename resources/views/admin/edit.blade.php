@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center gap-2">
        <div class="col-md col-sm">
            <a href="{{route('admin.show')}}">
                <button class="w-auto btn btn-secondary btn-lg my-3">Back</button>
            </a>
            <a href="https://www.google.co.id/maps" target="_blank">
                <button class="btn btn-warning btn-lg my-3">Maps</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <form class="" action="{{route('admin.update', [$assets->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Komponen</th>
                                <th>Detail</th>
                            </tr>
                            <tr>
                                <td>Nama tempat</td>
                                <td><input type="text" class="form-control" name="tempat" id="" placeholder="{{$assets->name}}"></td>
                            </tr>
                            <tr>
                                <td>Titik Koordinat</td>
                                <td><input type="text" class="form-control" name="titik" id="" placeholder="{{$assets->coordinates}}"></td>
                            </tr>
                            <tr>
                                <td>Visual aset</td>
                                <td><input type="file" name="image" placeholder="Upload image" id="image"></td>
                            </tr>
                        </table>
                        <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection