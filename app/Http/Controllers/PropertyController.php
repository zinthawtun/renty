<?php

namespace App\Http\Controllers;

use App\P_style;
use App\P_type;
use App\Property;
use Codescheme\Postcodes\Classes\Postcode;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $properties = Property::latest()->simplePaginate(5);
        return view('properties.index', compact('properties'))
            ->with('i', (request()->input('properties', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = P_type::all();
        $styles = P_style::all();
        return view('properties.create', compact('types', 'styles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'address' => 'required',
            'post_code' => 'required',
            'tenant_no' => 'required|integer',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = (new \Codescheme\Postcodes\Classes\Postcode)->validate($request['post_code']);

        if($data==true){

        Property::create([
            'address' => $request['address'],
            'post_code' => $request['post_code'],
            'tenant_no' => $request['tenant_no'],
            'type_id' => $request['type'],
            'style_id' => $request['style'],
            'user_id' => auth()->id(),
        ]);

            return redirect('/properties')->with('status', 'You have successfully posted');
        }
        else{
            return redirect('/properties/create')->with('warning', 'You have problem with postcode');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function oneProperty($id)
    {
        $property = Property::where('id', $id)->get()->first();
        return view('properties.view',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $types = P_type::all();
        $styles = P_style::all();
        return view('properties.edit', compact('property','types', 'styles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {

        $property->address   = $request['address'];
        $property->post_code = $request['post_code'];
        $property->tenant_no = $request['tenant_no'];
        $property->type_id      = $request['type'];
        $property->style_id     = $request['style'];
        $property->user_id   = auth()->id();
        $property->save();


        // redirect

        return redirect('/home')->with('status', 'You have successfully updated your property information.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();

        return redirect('/properties')->with('status', 'Your property information has been deleted.');
    }
}
