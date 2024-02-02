@extends('admin.main')
@section('content')
{{-- <h1 class="h3 mb-2 text-gray-800">Add New Location</h1> --}}
<div class="container mt-5">
    <div class="w-50 mx-auto">
        <div class="card pt-0 px-5 py-5 border" style="padding-top:20px !important">
            <h4 class="bg- text- p-2 rounded text-center">Add New Building</h4>
            <form @if(@$building) action="{{url('/building/edit/'.@$building->id)}}" @else action="{{url('/building/store')}}" @endif method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Building Name: </label>
                    <input type="text" required="" name="name" placeholder="Add building name" class="form-control" value="{{@$building->name}}">
                </div>
                <div class="form-group">
                    <label for="address">Address: </label>
                    <input type="text" required="" name="address" class="form-control" placeholder="Address" value="{{@$building->address}}">
                </div>
                <div class="form-group">
                    <label for="location">Select Location</label>
                    <select required="" name="location_id" id="" class="form-control">
                        <option value="">Select Location</option>
                        @foreach ($locations as $location)
                        <option @if(@$building->location_id == $location->id) selected="" @endif value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="images">Building Images (you can select multiple images)</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                </div>
                <div class="form-group d-flex" style="gap:10px">
                    <a href="{{url('/buildings')}}" type="submit" class="btn btn-danger w-50"> <i class="fa fa-cancel"></i> Cancel</a>
                    <button type="submit" class="btn btn-primary w-50"> <i class="fa fa-plus"></i> @if(@$building)Update @else Create @endif</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection