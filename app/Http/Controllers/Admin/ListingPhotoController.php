<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ListingPhoto;
use App\Http\Requests\CreateListingPhotoRequest;
use App\Http\Requests\UpdateListingPhotoRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Listing;


class ListingPhotoController extends Controller {

	/**
	 * Display a listing of listingphoto
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $listingphoto = ListingPhoto::with("listing")->get();

		return view('admin.listingphoto.index', compact('listingphoto'));
	}

	/**
	 * Show the form for creating a new listingphoto
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $listing = Listing::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.listingphoto.create', compact("listing"));
	}

	/**
	 * Store a newly created listingphoto in storage.
	 *
     * @param CreateListingPhotoRequest|Request $request
	 */
	public function store(CreateListingPhotoRequest $request)
	{
	    $request = $this->saveFiles($request);
		ListingPhoto::create($request->all());

		return redirect()->route(config('quickadmin.route').'.listingphoto.index');
	}

	/**
	 * Show the form for editing the specified listingphoto.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$listingphoto = ListingPhoto::find($id);
	    $listing = Listing::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.listingphoto.edit', compact('listingphoto', "listing"));
	}

	/**
	 * Update the specified listingphoto in storage.
     * @param UpdateListingPhotoRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateListingPhotoRequest $request)
	{
		$listingphoto = ListingPhoto::findOrFail($id);

        $request = $this->saveFiles($request);

		$listingphoto->update($request->all());

		return redirect()->route(config('quickadmin.route').'.listingphoto.index');
	}

	/**
	 * Remove the specified listingphoto from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ListingPhoto::destroy($id);

		return redirect()->route(config('quickadmin.route').'.listingphoto.index');
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
            ListingPhoto::destroy($toDelete);
        } else {
            ListingPhoto::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.listingphoto.index');
    }

}
