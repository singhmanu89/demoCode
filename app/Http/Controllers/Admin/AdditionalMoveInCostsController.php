<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdditionalMoveInCosts;
use App\Http\Requests\CreateAdditionalMoveInCostsRequest;
use App\Http\Requests\UpdateAdditionalMoveInCostsRequest;
use Illuminate\Http\Request;

use App\Property;
use App\SecurityDeposit;


class AdditionalMoveInCostsController extends Controller {

	/**
	 * Display a listing of additionalmoveincosts
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $additionalmoveincosts = AdditionalMoveInCosts::with("property")->with("securitydeposit")->get();

		return view('admin.additionalmoveincosts.index', compact('additionalmoveincosts'));
	}

	/**
	 * Show the form for creating a new additionalmoveincosts
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $property = Property::pluck("id", "id")->prepend('Please select', null);
$securitydeposit = SecurityDeposit::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.additionalmoveincosts.create', compact("property", "securitydeposit"));
	}

	/**
	 * Store a newly created additionalmoveincosts in storage.
	 *
     * @param CreateAdditionalMoveInCostsRequest|Request $request
	 */
	public function store(CreateAdditionalMoveInCostsRequest $request)
	{
	    
		AdditionalMoveInCosts::create($request->all());

		return redirect()->route(config('quickadmin.route').'.additionalmoveincosts.index');
	}

	/**
	 * Show the form for editing the specified additionalmoveincosts.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$additionalmoveincosts = AdditionalMoveInCosts::find($id);
	    $property = Property::pluck("id", "id")->prepend('Please select', null);
$securitydeposit = SecurityDeposit::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.additionalmoveincosts.edit', compact('additionalmoveincosts', "property", "securitydeposit"));
	}

	/**
	 * Update the specified additionalmoveincosts in storage.
     * @param UpdateAdditionalMoveInCostsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdditionalMoveInCostsRequest $request)
	{
		$additionalmoveincosts = AdditionalMoveInCosts::findOrFail($id);

        

		$additionalmoveincosts->update($request->all());

		return redirect()->route(config('quickadmin.route').'.additionalmoveincosts.index');
	}

	/**
	 * Remove the specified additionalmoveincosts from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdditionalMoveInCosts::destroy($id);

		return redirect()->route(config('quickadmin.route').'.additionalmoveincosts.index');
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
            AdditionalMoveInCosts::destroy($toDelete);
        } else {
            AdditionalMoveInCosts::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.additionalmoveincosts.index');
    }

}
