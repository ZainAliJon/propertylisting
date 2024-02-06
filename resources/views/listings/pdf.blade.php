@extends('admin.main')
@section('content')
<style>
    #accordionSidebar{
        display:none;
    }
    .navbar{
        display: none;
    }
    tr th{
        background: #7131a1;
        color:white;
        text-align: center
        -webkit-print-color-adjust: exact; 
    }
    @media print {
        body {
            color-adjust: exact !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
    tr td{
        text-align: center;
    }
    .custom-color{
        color:#7131a1 !important;
        text-decoration:none;
    }
    *{
        /* background: #fff !important; */
        color: black;
        font-size:12px;
        line-height: 1;
    }
    .row{
        display: flex;
    }
    .right{
        /* margin-top:-100px !important; */
    }
</style>
<div class="">
    <div class="" style="margin-bottom: 30px;min-height:100vh !important;">
        <div class="" style="display: block;">
            <div class="left px-2 col text-left" style="display:inline-block;width:45%;">
                <div>
                    <img style="margin-top:40px;width:120px" src="{{asset('/logo.webp')}}" alt="" >
                    <p>CEA Licence No. 17291837</p>
                </div>
                <div>
                    <p>Date:</p>
                    <p>Property Type:</p>
                    <p>For:</p>
                </div>
            </div>
            <div class="right col text-right" style="width:45%;display:inline-block;">
                <p><strong>Patrick Ong, Vice President</strong></p>
                <p>CEA Registration No.: R050300</p>
                <p>Email:patrick.ong@citicommercial.com.sg</p>
                <p><strong>Contact:</strong>+6591851777</p>
            </div>
        </div>
        <h3 class="text-center font-weight-bold" style="color: #7131a1">Listing Report</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Property Name</th>
                    <th>Location</th>
                    <th>Unit</th>
                    <th>Size (sf)</th>
                    <th>Gross Rate (psf)</th>
                    <th>Gross</th>
                    <th>Condition</th>
                    <th>Available Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listings as $listing)
                <tr>
                    <td>{{$listing['building']['name']}}</td>
                    <td>{{$listing['building']['location']['name']}}</td>
                    <td>{{$listing['unit_number']}}</td>
                    <td>{{$listing['size']}}</td>
                    <td>{{$listing['gross_rate_per_square']}}</td>
                    <td>{{$listing['total_price']}}</td>
                    <td>{{$listing['condition']}}</td>
                    <td>{{$listing['available_date']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    @foreach($listings as $list)
    <div class="" style="margin-top: 40px;">
        <div class="" style="display: block;">
            <div class="left px-2 col text-left" style="display:inline-block;width:45%;">
                <div>
                    <img src="{{asset('/logo.webp')}}" alt="" style="width:120px">
                    <p>CEA Licence No. 17291837</p>
                </div>
                <div>
                    <p>Date:</p>
                    <p>Property Type:</p>
                    <p>For:</p>
                </div>
            </div>
            <div class="right col text-right" style="width:45%;display:inline-block;">
                <p><strong>Patrick Ong, Vice President</strong></p>
                <p>CEA Registration No.: R050300</p>
                <p>Email:patrick.ong@citicommercial.com.sg</p>
                <p><strong>Contact:</strong>+6591851777</p>
            </div>
        </div>
        <div class="" style="display: block;">
            <div class="col-6 text-center" style="display: inline-block;width:45%;">Address</div>
            <div class="col-6 text-left" style="display: inline-block;width:45%;">:{{$list['building']['address']}}</div>
            <div class="col-6 text-center" style="display: inline-block;width:45%;">Building Size</div>
            <div class="col-6 text-left" style="display: inline-block;width:45%;">:{{$list['size']}}</div>
        </div>
        <div class="w-40 card shadow mx-auto p-5 text-center mt-4" style="width: 40%;">
            <h3 class="text-center">{{$list['building']['name']}}</h3>
            <p><strong>Size:</strong>{{$list['size']}}</p>
            <p><strong>Location:</strong>{{$list['building']['location']['name']}}</p>
        </div>
        {{-- <h4 class="text-center py-3 custom-color font-weight-bold mt-4">Floor Plan Image</h4> --}}
        <div class="row">
            @php
            $floor_plan_images = explode(', ', $list['floor_plan_images'] );
            @endphp
            @foreach ($floor_plan_images as $img)
            <div class="col-12 col-md-12 col-lg-12  text-center mt-3" style="text-align: center">
                <img src="{{$img}}" alt=""style="width: 80%;height:400px;">
            </div>
            @endforeach
        </div>
        <h4 class="text-center py-3 custom-color font-weight-bold mt-4" style="margin:20px;">{{$list['building']['location']['name']}}</h4>
        <div class="row" style="display: block;margin-top:20px !important;">
            @php
            $images = explode(', ', $list['images'] );
            @endphp
            @foreach($images as $img)
            <div class="col-6 col-md-6 col-lg-4  text-center" style="display: inline-block;width:45%;margin-top:20px;margin-bottom:30px;">
                <img style="width: 300px;height:200px;" src="{{$img}}" alt="">
            </div>
            @endforeach
        </div>
        
    </div>
    @endforeach
</div>
@endsection