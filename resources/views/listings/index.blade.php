@extends('admin.main')
@section('content')
{{-- <h1 class="h3 mb-2 text-gray-800">listings</h1> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All listings</h6>
        <a href="{{url('/listing/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=" fa fa-plus-circle fa-sm text-white-50"></i> Add listing</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">#</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="3" aria-label="Position: activate to sort column ascending" style="width: 248px;">Building Detail</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Total Price</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Condition</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Available Date</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listings as $index => $listing)
                    <tr class="odd">
                        <td class="sorting_1">{{++$index}}</td>
                        <td colspan="3">
                            <strong>Building Name:</strong>{{$listing->building->name}} <br>
                            <strong>Unit: </strong> {{$listing->unit_number}} <br>
                            <strong>Size: </strong> {{$listing->size}} <br>
                            <strong>Gross Rate: </strong> {{$listing->gross_rate_per_square}} <br>
                        </td>
                        <td>{{$listing->total_price}}</td>
                        <td>{{$listing->condition}}</td>
                        <td>{{$listing->available_date}}</td>
                        <td>
                            <div class="">
                                <a href="{{url('/listing/edit/'.$listing->id)}}" class="btn btn-success btn-icon-split ">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    
                                </a>
                                <a href="{{url('/listing/delete/'.$listing->id)}}" class="btn btn-danger btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table></div></div></div>
            </div>
        </div>
    </div>
    @endsection