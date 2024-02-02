@extends('admin.main')
@section('content')
{{-- <h1 class="h3 mb-2 text-gray-800">Buildings</h1> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All Buildings</h6>
        <a href="{{url('/building/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=" fa fa-plus-circle fa-sm text-white-50"></i> Add Building</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">#</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 248px;">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 248px;">Address</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 248px;">Location</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Created at</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Update</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 108px;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buildings as $index => $building)
                    <tr class="odd">
                        <td class="sorting_1">{{++$index}}</td>
                        <td>{{$building->name}}</td>
                        <td>{{$building->address}}</td>
                        <td>{{$building->location->name}}</td>
                        <td>{{date_format($building->created_at, 'H M Y')}}</td>
                        <td>
                            <a href="{{url('/building/edit/'.$building->id)}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Update</span>
                            </a>
                        </td>
                        <td>
                            <a href="{{url('/building/delete/'.$building->id)}}" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table></div></div></div>
            </div>
        </div>
    </div>
    @endsection