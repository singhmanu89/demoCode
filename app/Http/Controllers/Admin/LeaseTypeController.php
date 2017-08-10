<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\LeaseType;
use App\Http\Requests\CreateLeaseTypeRequest;
use App\Http\Requests\UpdateLeaseTypeRequest;
use Illuminate\Http\Request;



class LeaseTypeController extends Controller {

	/**
	 * Display a listing of leasetype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $leasetype = LeaseType::all();

		return view('admin.leasetype.index', compact('leasetype'));
	}

	/**
	 * Show the form for creating a new leasetype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.leasetype.create');
	}

	/**
	 * Store a newly created leasetype in storage.
	 *
     * @param CreateLeaseTypeRequest|Request $request
	 */
	public function store(CreateLeaseTypeRequest $request)
	{
	    
		LeaseType::create($request->all());

		return redirect()->route(config('quickadmin.route').'.leasetype.index');
	}

	/**
	 * Show the form for editing the specified leasetype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$leasetype = LeaseType::find($id);
	    
	    
		return view('admin.leasetype.edit', compact('leasetype'));
	}

	/**
	 * Update the specified leasetype in storage.
     * @param UpdateLeaseTypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateLeaseTypeRequest $request)
	{
		$leasetype = LeaseType::findOrFail($id);

        

		$leasetype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.leasetype.index');
	}

	/**
	 * Remove the specified leasetype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		LeaseType::destroy($id);

		return redirect()->route(config('quickadmin.route').'.leasetype.index');
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
            LeaseType::destroy($toDelete);
        } else {
            LeaseType::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.leasetype.index');
    }

}
