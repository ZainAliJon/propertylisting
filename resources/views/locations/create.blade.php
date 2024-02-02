@extends('admin.main')
@section('content')
{{-- <h1 class="h3 mb-2 text-gray-800">Add New Location</h1> --}}
<div class="container mt-5">
    <div class="w-50 mx-auto">
        <div class="card pt-0 px-5 py-5 border" style="padding-top:20px !important">
            <h4 class="bg- text- p-2 rounded text-center">Add New Location</h4>
            <form @if(@$location) action="{{url('/location/edit/'.@$location->id)}}" @else action="{{url('/location/store')}}" @endif method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Location Name: </label>
                    <input required="" type="text" value="{{@$location->name}}" name="name" id="name" placeholder="Add Location Name " required class="form-control"/>
                </div>
                <div class="form-group d-flex" style="gap:10px">
                    <a href="{{url('/locations')}}" type="submit" class="btn btn-danger w-50"> <i class="fa fa-cancel"></i> Cancel</a>
                    <button type="submit" class="btn btn-primary w-50"> <i class="fa fa-plus"></i> @if(@$location)Update @else Create @endif</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection