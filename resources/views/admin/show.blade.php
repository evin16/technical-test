@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="d-grid-flex">
                        {{ __('Halaman Layanan Penyewaan Aset PT. Nikel Sejahtera') }}
                        <a href="{{route('booking.index')}}" class="btn btn-primary btn-sm float-end"> <i class="bi bi-plus-lg"></i> </a>
                        <a href="{{route('booking.export')}}" class="btn btn-success btn-sm float-end mx-2"> <i class="bi bi-file-earmark-excel"></i></a>
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
                                <th>Action</th>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#status">
                                        <i class="bi bi-info-circle"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation
                                                        Boking</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('booking.approved', [$data->id])}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mb-3 g-3">
                                                            <div class="col">
                                                                <label class="form-label fw-bold">Status</label>
                                                                <select class="form-select" name="status" required>
                                                                    <option>approved</option>
                                                                    <option>pending</option>
                                                                    <option>rejected</option>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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