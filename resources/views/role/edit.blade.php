@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center gap-2">
        <div class="col-md col-sm">
            <a href="{{route('role.index')}}">
                <button class="w-auto btn btn-secondary btn-lg my-3">Back</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <form class="" action="{{route('role.update', [$users->id])}}" method="post">
                        @csrf
                        <table class="table">
                            <tr>
                                <th>Komponen</th>
                                <th>Detail</th>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" class="form-control" name="name" id="" placeholder="{{$users->name}}"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" class="form-control" name="email" id="" placeholder="{{$users->coordinates}}"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" class="form-control" name="password"></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>
                                    <select class="form-select" name="admin">
                                        <option selected> </option>
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                                </td>
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