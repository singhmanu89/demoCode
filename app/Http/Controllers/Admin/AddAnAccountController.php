<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AddAnAccount;
use App\Http\Requests\CreateAddAnAccountRequest;
use App\Http\Requests\UpdateAddAnAccountRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;


class AddAnAccountController extends Controller {

	/**
	 * Display a listing of addanaccount
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
              $user_id = Auth::user()->id;
        $addanaccount = AddAnAccount::where('user_id',$user_id)->with("user")->get();

		return view('admin.addanaccount.index', compact('addanaccount'));
	}

	/**
	 * Show the form for creating a new addanaccount
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.addanaccount.create', compact("user"));
	}

	/**
	 * Store a newly created addanaccount in storage.
	 *
     * @param CreateAddAnAccountRequest|Request $request
	 */
	public function store(CreateAddAnAccountRequest $request)
	{
	    
		AddAnAccount::create($request->all());

		return redirect()->route(config('quickadmin.route').'.addanaccount.index');
	}

	/**
	 * Show the form for editing the specified addanaccount.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$addanaccount = AddAnAccount::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.addanaccount.edit', compact('addanaccount', "user"));
	}

	/**
	 * Update the specified addanaccount in storage.
     * @param UpdateAddAnAccountRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAddAnAccountRequest $request)
	{
		$addanaccount = AddAnAccount::findOrFail($id);

        

		$addanaccount->update($request->all());

		return redirect()->route(config('quickadmin.route').'.addanaccount.index');
	}

	/**
	 * Remove the specified addanaccount from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AddAnAccount::destroy($id);

		return redirect()->route(config('quickadmin.route').'.addanaccount.index');
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
            AddAnAccount::destroy($toDelete);
        } else {
            AddAnAccount::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.addanaccount.index');
    }

}
