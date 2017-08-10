<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Property;
use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\PropertyType;
use Auth;


class PropertyController extends Controller {

	/**
	 * Display a listing of property
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
              $user_id = Auth::user()->id;
              
       $property = Property::where('user_id',$user_id)->with("propertytype")->get();

         
		return view('admin.property.index', compact('property'));
	}

	/**
	 * Show the form for creating a new property
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
         
	    $propertytype = PropertyType::pluck("name", "id")->prepend('Please select', '');

          
            
	    
	    return view('admin.property.create', compact("propertytype"));
	}

	/**
	 * Store a newly created property in storage.
	 *
     * @param CreatePropertyRequest|Request $request
	 */
	public function store(CreatePropertyRequest $request)
	{
	    $request = $this->saveFiles($request);
		Property::create($request->all());

		return redirect()->route(config('quickadmin.route').'.property.index');
	}

	/**
	 * Show the form for editing the specified property.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
             $user_id = Auth::user()->id;
//             /where('user_id',$user_id)->
		$property = Property::find($id);
                
               if($property->user_id==$user_id){

                $propertytype = PropertyType::pluck("name", "id")->prepend('Please select', '');	    
		return view('admin.property.edit', compact('property', "propertytype"));
                }else{
                    
               return redirect()->route(config('quickadmin.route').'.property.index'); 
                }
	}

	/**
	 * Update the specified property in storage.
     * @param UpdatePropertyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePropertyRequest $request)
	{
		$property = Property::findOrFail($id);

        $request = $this->saveFiles($request);

		$property->update($request->all());

		return redirect()->route(config('quickadmin.route').'.property.index');
	}

	/**
	 * Remove the specified property from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Property::destroy($id);

		return redirect()->route(config('quickadmin.route').'.property.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Property::destroy($toDelete);
        } else {
            Property::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.property.index');
    }

}
