<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Building;
use Illuminate\Http\Request;
use PDF;
class ListingController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $listings = Listing::with('building')->get();
        return view('listings.index', compact('listings'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //
        $buildings = Building::all();
        return view('listings.create',compact('buildings'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        //
        $listing=new Listing();
        $data = $request->except('_token');
        $images = $request->file('images');
        $floor_plan_images = $request->file('floor_plan_images');
        $data_images = [];
        foreach ($images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $data_images[] = url('/storage/app/public/images')."/".$filename;
        }
        $jsonData = implode(", " ,$data_images);
        $data['images'] = $jsonData;
        $data_images2 = [];
        foreach ($floor_plan_images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $data_images2[] = url('/storage/app/public/images')."/".$filename;
        }
        $jsonData2 = implode(", " ,$data_images2);
        $data['floor_plan_images'] = $jsonData2;
        $listing->create($data);
        return redirect(url('/listings'));
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Listing $listing)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        //
        $buildings = Building::all();
        $listing = Listing::find($id);
        return view('listings.create',compact('buildings', 'listing'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $listing = Listing::find($id);
        $data = $request->except('_token');
        $images = $request->file('images');
        $floor_plan_images = $request->file('floor_plan_images');
        if($request->images){
            $data_images = [];
            foreach ($images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);
                $data_images[] = url('/storage/app/public/images')."/".$filename;
            }
            $jsonData = implode(", " ,$data_images);
            $data['images'] = $jsonData;
        }
        if($request->floor_plan_images){
            $data_images2 = [];
            foreach ($floor_plan_images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);
                $data_images2[] = url('/storage/app/public/images')."/".$filename;
            }
            $jsonData2 = implode(", " ,$data_images2);
            $data['floor_plan_images'] = $jsonData2;
        }
        $listing->update($data);
        return redirect(url('/listings'));
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy($id)
    {
        $Listing = Listing::find($id)->delete();
        return redirect()->back();
    }
    
    public function pdf(){
        $listings = Listing::with('building.location')->get()->toArray();
        // dd($listings);
        return view('listings.pdf', compact('listings'));
    }
    public function downlaod_pdf(Request $request){
        // dd($request->all());
        $data = $request->checkbox;
        if($data == null){
            $listings = Listing::with('building.location')->get()->toArray();
        }else{

            $listings = Listing::with('building.location')
            ->whereIn('id', $data) 
            ->get()
            ->toArray();
        }
        $data['listings'] = $listings;
        // return view('listings.pdf', compact('listings'));
        $pdf = PDF::loadView('listings.pdf', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('listings.pdf');
        // return $pdf->download('listings.pdf');
    }
}
