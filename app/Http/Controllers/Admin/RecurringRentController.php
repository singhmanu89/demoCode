<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RecurringRent;
use App\Http\Requests\CreateRecurringRentRequest;
use App\Http\Requests\UpdateRecurringRentRequest;
use Illuminate\Http\Request;

use App\Property;


class RecurringRentController extends Controller {

	/**
	 * Display a listing of recurringrent
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $recurringrent = RecurringRent::with("property")->get();

		return view('admin.recurringrent.index', compact('recurringrent'));
	}

	/**
	 * Show the form for creating a new recurringrent
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $property = Property::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.recurringrent.create', compact("property"));
	}

	/**
	 * Store a newly created recurringrent in storage.
	 *
     * @param CreateRecurringRentRequest|Request $request
	 */
	public function store(CreateRecurringRentRequest $request)
	{
	    
		RecurringRent::create($request->all());

		return redirect()->route(config('quickadmin.route').'.recurringrent.index');
	}

	/**
	 * Show the form for editing the specified recurringrent.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$recurringrent = RecurringRent::find($id);
	    $property = Property::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.recurringrent.edit', compact('recurringrent', "property"));
	}

	/**
	 * Update the specified recurringrent in storage.
     * @param UpdateRecurringRentRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRecurringRentRequest $request)
	{
		$recurringrent = RecurringRent::findOrFail($id);

        

		$recurringrent->update($request->all());

		return redirect()->route(config('quickadmin.route').'.recurringrent.index');
	}

	/**
	 * Remove the specified recurringrent from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RecurringRent::destroy($id);

		return redirect()->route(config('quickadmin.route').'.recurringrent.index');
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
            RecurringRent::destroy($toDelete);
        } else {
            RecurringRent::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.recurringrent.index');
    }

}
