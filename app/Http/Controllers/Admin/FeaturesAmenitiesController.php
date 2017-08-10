<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\FeaturesAmenities;
use App\Http\Requests\CreateFeaturesAmenitiesRequest;
use App\Http\Requests\UpdateFeaturesAmenitiesRequest;
use Illuminate\Http\Request;



class FeaturesAmenitiesController extends Controller {

	/**
	 * Display a listing of featuresamenities
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $featuresamenities = FeaturesAmenities::all();

		return view('admin.featuresamenities.index', compact('featuresamenities'));
	}

	/**
	 * Show the form for creating a new featuresamenities
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.featuresamenities.create');
	}

	/**
	 * Store a newly created featuresamenities in storage.
	 *
     * @param CreateFeaturesAmenitiesRequest|Request $request
	 */
	public function store(CreateFeaturesAmenitiesRequest $request)
	{
	    
		FeaturesAmenities::create($request->all());

		return redirect()->route(config('quickadmin.route').'.featuresamenities.index');
	}

	/**
	 * Show the form for editing the specified featuresamenities.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$featuresamenities = FeaturesAmenities::find($id);
	    
	    
		return view('admin.featuresamenities.edit', compact('featuresamenities'));
	}

	/**
	 * Update the specified featuresamenities in storage.
     * @param UpdateFeaturesAmenitiesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFeaturesAmenitiesRequest $request)
	{
		$featuresamenities = FeaturesAmenities::findOrFail($id);

        

		$featuresamenities->update($request->all());

		return redirect()->route(config('quickadmin.route').'.featuresamenities.index');
	}

	/**
	 * Remove the specified featuresamenities from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		FeaturesAmenities::destroy($id);

		return redirect()->route(config('quickadmin.route').'.featuresamenities.index');
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
            FeaturesAmenities::destroy($toDelete);
        } else {
            FeaturesAmenities::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.featuresamenities.index');
    }

}
