@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="d-grid-flex">
                        {{ __('Halaman Layanan Monitoring Aset PT. Nikel Sejahtera') }}
                        <a href="{{route('role.insert')}}" class="btn btn-primary btn-sm float-end disabled"> <i class="bi bi-plus-lg"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="data">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($driver as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->age}}</td>
                                <td>
                                    @if($data->status == 'available')
                                    <span class="badge bg-success">Available</span>
                                    @else
                                    <span class="badge bg-secondary">Not Available</span>
                                    @endif
                                </td>
                                <!-- <td>
                                    @if($data->admin == 1)
                                    <span class="badge bg-success">Admin</span>
                                    @else
                                    <span class="badge bg-secondary">User</span>
                                    @endif
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $('#data').DataTable({
        responsive: true
    });
</script>
@endsection