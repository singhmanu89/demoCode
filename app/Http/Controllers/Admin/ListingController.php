<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Listing;
use App\Http\Requests\CreateListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Http\Request;

use App\Property;
use App\PropertyType;
use App\Petpolicy;
use App\FeaturesAmenities;
use Auth;

class ListingController extends Controller {

	/**
	 * Display a listing of listing
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
            
             $user_id = Auth::user()->id;
             if(Auth::user()->role_id==3){
                    $listing = Listing::with("property")->with("propertytype")->with("petpolicy")->with("featuresamenities")->get();                 
             }else{
                 
                    $listing = Listing::with("property")->with("propertytype")->with("petpolicy")->with("featuresamenities")->get();
             }
     

		return view('admin.listing.index', compact('listing'));
	}

	/**
	 * Show the form for creating a new listing
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $property = Property::pluck("unit_name", "id")->prepend('Please select', null);
$propertytype = PropertyType::pluck("name", "id")->prepend('Please select', null);
$petpolicy = Petpolicy::pluck("name", "id")->prepend('Please select', null);
$featuresamenities = FeaturesAmenities::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.listing.create', compact("property", "propertytype", "petpolicy", "featuresamenities"));
	}

	/**
	 * Store a newly created listing in storage.
	 *
     * @param CreateListingRequest|Request $request
	 */
	public function store(CreateListingRequest $request)
	{
	    
		Listing::create($request->all());

		return redirect()->route(config('quickadmin.route').'.listing.index');
	}

	/**
	 * Show the form for editing the specified listing.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$listing = Listing::find($id);
	    $property = Property::pluck("unit_name", "id")->prepend('Please select', null);
$propertytype = PropertyType::pluck("name", "id")->prepend('Please select', null);
$petpolicy = Petpolicy::pluck("name", "id")->prepend('Please select', null);
$featuresamenities = FeaturesAmenities::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.listing.edit', compact('listing', "property", "propertytype", "petpolicy", "featuresamenities"));
	}

	/**
	 * Update the specified listing in storage.
     * @param UpdateListingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateListingRequest $request)
	{
		$listing = Listing::findOrFail($id);

        

		$listing->update($request->all());

		return redirect()->route(config('quickadmin.route').'.listing.index');
	}

	/**
	 * Remove the specified listing from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Listing::destroy($id);

		return redirect()->route(config('quickadmin.route').'.listing.index');
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
            Listing::destroy($toDelete);
        } else {
            Listing::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.listing.index');
    }

}
