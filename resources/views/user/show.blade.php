@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="d-grid-flex">
                        {{ __('Halaman Layanan Penyewaan Aset PT. Nikel Sejahtera') }}
                        <a href="{{route('booking.user')}}" class="btn btn-primary btn-sm float-end"> <i class="bi bi-plus-lg"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="data">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Vehicle</th>
                                <th>Drivers</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Renters</th>
                                <th>Approved by</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->vname}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->start}}</td>
                                <td>{{$data->end}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->adminname}}</td>
                                <td>
                                    @if($data->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                    @elseif($data->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                    @else
                                    <span class="badge bg-danger">Not Available</span>
                                    @endif
                                </td>
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