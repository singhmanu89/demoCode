<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Security;
use App\Http\Requests\CreateSecurityRequest;
use App\Http\Requests\UpdateSecurityRequest;
use Illuminate\Http\Request;



class SecurityController extends Controller {

	/**
	 * Display a listing of security
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $security = Security::all();

		return view('admin.security.index', compact('security'));
	}

	/**
	 * Show the form for creating a new security
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.security.create');
	}

	/**
	 * Store a newly created security in storage.
	 *
     * @param CreateSecurityRequest|Request $request
	 */
	public function store(CreateSecurityRequest $request)
	{
	    
		Security::create($request->all());

		return redirect()->route(config('quickadmin.route').'.security.index');
	}

	/**
	 * Show the form for editing the specified security.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$security = Security::find($id);
	    
	    
		return view('admin.security.edit', compact('security'));
	}

	/**
	 * Update the specified security in storage.
     * @param UpdateSecurityRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSecurityRequest $request)
	{
		$security = Security::findOrFail($id);

        

		$security->update($request->all());

		return redirect()->route(config('quickadmin.route').'.security.index');
	}

	/**
	 * Remove the specified security from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Security::destroy($id);

		return redirect()->route(config('quickadmin.route').'.security.index');
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
            Security::destroy($toDelete);
        } else {
            Security::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.security.index');
    }

}
