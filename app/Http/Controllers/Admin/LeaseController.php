<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Lease;
use App\Http\Requests\CreateLeaseRequest;
use App\Http\Requests\UpdateLeaseRequest;
use Illuminate\Http\Request;
use Auth;
use App\Property;
use App\LeaseType;


class LeaseController extends Controller {

	/**
	 * Display a listing of lease
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
            
             $user_id = Auth::user()->id;
        $lease = Lease::with("property")->with("leasetype")->get();

		return view('admin.lease.index', compact('lease'));
	}

	/**
	 * Show the form for creating a new lease
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
              $user_id = Auth::user()->id;
              
	    $property = Property::where('user_id',$user_id)->pluck("unit_name", "id")->prepend('Please select', '');
$leasetype = LeaseType::pluck("name", "id")->prepend('Please select', '');

	    
	    return view('admin.lease.create', compact("property", "leasetype"));
	}

	/**
	 * Store a newly created lease in storage.
	 *
     * @param CreateLeaseRequest|Request $request
	 */
	public function store(CreateLeaseRequest $request)
	{
	    
		Lease::create($request->all());

		return redirect()->route(config('quickadmin.route').'.lease.index');
	}

	/**
	 * Show the form for editing the specified lease.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$lease = Lease::find($id);
	    $property = Property::pluck("unit_name", "id")->prepend('Please select', '');
$leasetype = LeaseType::pluck("name", "id")->prepend('Please select', '');

	    
		return view('admin.lease.edit', compact('lease', "property", "leasetype"));
	}

	/**
	 * Update the specified lease in storage.
     * @param UpdateLeaseRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateLeaseRequest $request)
	{
		$lease = Lease::findOrFail($id);

        

		$lease->update($request->all());

		return redirect()->route(config('quickadmin.route').'.lease.index');
	}

	/**
	 * Remove the specified lease from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Lease::destroy($id);

		return redirect()->route(config('quickadmin.route').'.lease.index');
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
            Lease::destroy($toDelete);
        } else {
            Lease::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.lease.index');
    }

}
