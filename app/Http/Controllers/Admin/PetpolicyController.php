<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Petpolicy;
use App\Http\Requests\CreatePetpolicyRequest;
use App\Http\Requests\UpdatePetpolicyRequest;
use Illuminate\Http\Request;



class PetpolicyController extends Controller {

	/**
	 * Display a listing of petpolicy
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $petpolicy = Petpolicy::all();

		return view('admin.petpolicy.index', compact('petpolicy'));
	}

	/**
	 * Show the form for creating a new petpolicy
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.petpolicy.create');
	}

	/**
	 * Store a newly created petpolicy in storage.
	 *
     * @param CreatePetpolicyRequest|Request $request
	 */
	public function store(CreatePetpolicyRequest $request)
	{
	    
		Petpolicy::create($request->all());

		return redirect()->route(config('quickadmin.route').'.petpolicy.index');
	}

	/**
	 * Show the form for editing the specified petpolicy.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$petpolicy = Petpolicy::find($id);
	    
	    
		return view('admin.petpolicy.edit', compact('petpolicy'));
	}

	/**
	 * Update the specified petpolicy in storage.
     * @param UpdatePetpolicyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePetpolicyRequest $request)
	{
		$petpolicy = Petpolicy::findOrFail($id);

        

		$petpolicy->update($request->all());

		return redirect()->route(config('quickadmin.route').'.petpolicy.index');
	}

	/**
	 * Remove the specified petpolicy from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Petpolicy::destroy($id);

		return redirect()->route(config('quickadmin.route').'.petpolicy.index');
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
            Petpolicy::destroy($toDelete);
        } else {
            Petpolicy::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.petpolicy.index');
    }

}
