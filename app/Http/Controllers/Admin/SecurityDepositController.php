<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\SecurityDeposit;
use App\Http\Requests\CreateSecurityDepositRequest;
use App\Http\Requests\UpdateSecurityDepositRequest;
use Illuminate\Http\Request;

use App\Property;
use App\Security;


class SecurityDepositController extends Controller {

	/**
	 * Display a listing of securitydeposit
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $securitydeposit = SecurityDeposit::with("property")->with("security")->get();

		return view('admin.securitydeposit.index', compact('securitydeposit'));
	}

	/**
	 * Show the form for creating a new securitydeposit
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $property = Property::pluck("id", "id")->prepend('Please select', null);
$security = Security::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.securitydeposit.create', compact("property", "security"));
	}

	/**
	 * Store a newly created securitydeposit in storage.
	 *
     * @param CreateSecurityDepositRequest|Request $request
	 */
	public function store(CreateSecurityDepositRequest $request)
	{
	    
		SecurityDeposit::create($request->all());

		return redirect()->route(config('quickadmin.route').'.securitydeposit.index');
	}

	/**
	 * Show the form for editing the specified securitydeposit.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$securitydeposit = SecurityDeposit::find($id);
	    $property = Property::pluck("id", "id")->prepend('Please select', null);
$security = Security::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.securitydeposit.edit', compact('securitydeposit', "property", "security"));
	}

	/**
	 * Update the specified securitydeposit in storage.
     * @param UpdateSecurityDepositRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSecurityDepositRequest $request)
	{
		$securitydeposit = SecurityDeposit::findOrFail($id);

        

		$securitydeposit->update($request->all());

		return redirect()->route(config('quickadmin.route').'.securitydeposit.index');
	}

	/**
	 * Remove the specified securitydeposit from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		SecurityDeposit::destroy($id);

		return redirect()->route(config('quickadmin.route').'.securitydeposit.index');
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
            SecurityDeposit::destroy($toDelete);
        } else {
            SecurityDeposit::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.securitydeposit.index');
    }

}
