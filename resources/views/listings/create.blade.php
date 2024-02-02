@extends('admin.main')
@section('content')
{{-- <h1 class="h3 mb-2 text-gray-800">Add New Location</h1> --}}
<div class="container mt-5">
    <div class="w-75 mx-auto">
        <div class="card pt-0 px-5 py-5 border" style="padding-top:20px !important">
            <h4 class="bg- text- p-2 rounded text-center">Add New Listing</h4>
            <form class="row" @if(@$listing) action="{{url('/listing/edit/'.@$listing->id)}}" @else action="{{url('/listing/store')}}" @endif method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12">
                    <label for="name">Building Name: </label>
                    <select required="" name="building_id" id="" class="form-control">
                        <option value="">Select Building</option>
                        @foreach ($buildings as $building)
                        <option @if(@$listing->building_id == $building->id) selected="" @endif value="{{$building->id}}">{{$building->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="address">Unit number: </label>
                    <input type="text" required="" name="unit_number" class="form-control" value="{{@$listing->unit_number}}">
                </div>
                <div class="form-group col-6">
                    <label for="address">Size: </label>
                    <input type="text" required="" name="size" class="form-control"  value="{{@$listing->size}}">
                </div>
                <div class="form-group col-6">
                    <label for="address">Gros Rate per square: </label>
                    <input type="text" required="" name="gross_rate_per_square" class="form-control" value="{{@$listing->gross_rate_per_square}}">
                </div>
                <div class="form-group col-6">
                    <label for="address">Total Price: </label>
                    <input type="text" required="" name="total_price" class="form-control"  value="{{@$listing->total_price}}">
                </div>
                <div class="form-group col-6">
                    <label for="address">Condition: </label>
                    <select name="condition" id="" class="form-control">
                        <option value="">Select Condition</option>
                        <option @if(@$listing->condition == "Any") selected="" @endif value="Any">Any</option>
                        <option @if(@$listing->condition == "filtered") selected="" @endif  value="filtered">filtered</option>
                        <option @if(@$listing->condition == "bare") selected="" @endif  value="bare">bare</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="address">Available date: </label>
                    <input type="date" name="available_date" class="form-control" value="{{@$listing->available_date}}">
                </div>
                <div class="form-group col-6">
                    <label for="images">listing Images (you can select multiple images)</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>
                <div class="form-group col-6">
                    <label for="images">Floor Plan Images (you can select multiple images)</label>
                    <input type="file" name="floor_plan_images[]" class="form-control" multiple>
                </div>
                <div class="form-group d-flex col-12" style="gap:10px">
                    <a href="{{url('/buildings')}}" type="submit" class="btn btn-danger w-50"> <i class="fa fa-cancel"></i> Cancel</a>
                    <button type="submit" class="btn btn-primary w-50"> <i class="fa fa-plus"></i> @if(@$listing)Update @else Create @endif</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection