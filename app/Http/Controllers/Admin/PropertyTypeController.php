<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\PropertyType;
use App\Http\Requests\CreatePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use Illuminate\Http\Request;



class PropertyTypeController extends Controller {

	/**
	 * Display a listing of propertytype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $propertytype = PropertyType::all();

		return view('admin.propertytype.index', compact('propertytype'));
	}

	/**
	 * Show the form for creating a new propertytype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.propertytype.create');
	}

	/**
	 * Store a newly created propertytype in storage.
	 *
     * @param CreatePropertyTypeRequest|Request $request
	 */
	public function store(CreatePropertyTypeRequest $request)
	{
	    
		PropertyType::create($request->all());

		return redirect()->route(config('quickadmin.route').'.propertytype.index');
	}

	/**
	 * Show the form for editing the specified propertytype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$propertytype = PropertyType::find($id);
	    
	    
		return view('admin.propertytype.edit', compact('propertytype'));
	}

	/**
	 * Update the specified propertytype in storage.
     * @param UpdatePropertyTypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePropertyTypeRequest $request)
	{
		$propertytype = PropertyType::findOrFail($id);

        

		$propertytype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.propertytype.index');
	}

	/**
	 * Remove the specified propertytype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		PropertyType::destroy($id);

		return redirect()->route(config('quickadmin.route').'.propertytype.index');
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
            PropertyType::destroy($toDelete);
        } else {
            PropertyType::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.propertytype.index');
    }

}
