<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Tenants;
use App\Http\Requests\CreateTenantsRequest;
use App\Http\Requests\UpdateTenantsRequest;
use Illuminate\Http\Request;

use App\Property;


class TenantsController extends Controller {

	/**
	 * Display a listing of tenants
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $tenants = Tenants::with("property")->get();

		return view('admin.tenants.index', compact('tenants'));
	}

	/**
	 * Show the form for creating a new tenants
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $property = Property::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.tenants.create', compact("property"));
	}

	/**
	 * Store a newly created tenants in storage.
	 *
     * @param CreateTenantsRequest|Request $request
	 */
	public function store(CreateTenantsRequest $request)
	{
	    
		Tenants::create($request->all());

		return redirect()->route(config('quickadmin.route').'.tenants.index');
	}

	/**
	 * Show the form for editing the specified tenants.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$tenants = Tenants::find($id);
	    $property = Property::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.tenants.edit', compact('tenants', "property"));
	}

	/**
	 * Update the specified tenants in storage.
     * @param UpdateTenantsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTenantsRequest $request)
	{
		$tenants = Tenants::findOrFail($id);

        

		$tenants->update($request->all());

		return redirect()->route(config('quickadmin.route').'.tenants.index');
	}

	/**
	 * Remove the specified tenants from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Tenants::destroy($id);

		return redirect()->route(config('quickadmin.route').'.tenants.index');
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
            Tenants::destroy($toDelete);
        } else {
            Tenants::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.tenants.index');
    }

}
