<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Location;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $buildings = Building::with('location')->get();
        return view('buildings.index', compact('buildings'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $locations = Location::all();
        return view('buildings.create',compact('locations'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $building=new Building();
        $data = $request->except('_token');
        $images = $request->file('images');
        $data_images = [];
        foreach ($images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $data_images[] = url('/storage/app/public/images')."/".$filename;
        }
        $jsonData = implode(", " ,$data_images);
        $data['images'] = $jsonData;
        $building->create($data);
        return redirect(url('/buildings'));
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Building $building)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        //
        $locations = Location::all();
        $building = Building::find($id);
        return view('buildings.create',compact('locations', 'building'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $building= Building::find($id);
        $data = $request->except('_token');
        $images = $request->file('images');
        $data_images = [];
        if($request->images){   
            foreach ($images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);
                $data_images[] = url('/storage/app/public/images')."/".$filename;
            }
            $jsonData = implode(", " ,$data_images);
            $data['images'] = $jsonData;
        }
        $building->update($data);
        return redirect(url('/buildings'));
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        $building = Building::find($id)->delete();
        return redirect()->back();
    }
}
