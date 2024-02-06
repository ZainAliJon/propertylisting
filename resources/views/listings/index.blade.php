@extends('admin.main')
@section('content')
<style>
    tr th {
    background: #7131a1;
    color: #fff;
}
</style>
<form action="{{url('/listing/pdf_downlaod')}}" method="post">
@csrf
{{-- <h1 class="h3 mb-2 text-gray-800">listings</h1> --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All listings</h6>
        <div>
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class=" fa fa-download fa-sm text-white-50"></i>Download</button>
        <a href="{{url('/listing/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=" fa fa-plus-circle fa-sm text-white-50"></i> Add listing</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="example22" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th>Select</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">#</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Property Name</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 130px;">Size</th>
                        {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="3" aria-label="Position: activate to sort column ascending" style="width: 248px;">Location</th> --}}
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 120px;">Unit</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Gross Rate (psf)</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 130px;">Total</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Condition</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Available Date</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listings as $index => $listing)
                    <tr class="odd">
                        <td>
                            <input type="checkbox" checked name="checkbox[]" value="{{$listing['id']}}">
                        </td>
                        <td class="sorting_1">{{++$index}}</td>
                        <td colspan="1">
                            {{$listing->building->name}}
                        </td>
                        <td>{{$listing->size}}</td>
                        <td>{{$listing->unit_number}}</td>
                        <td>{{$listing->gross_rate_per_square}}</td>
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
</form>
    @endsection