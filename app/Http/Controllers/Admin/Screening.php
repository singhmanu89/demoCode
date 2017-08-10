<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Tenants;
use App\Http\Requests\CreateTenantsRequest;
use App\Http\Requests\UpdateTenantsRequest;
use Illuminate\Http\Request;


class Screening extends Controller {

	/**
	 * Display a listing of tenants
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
    
		return view('admin.screening.index');
	}
 

}
