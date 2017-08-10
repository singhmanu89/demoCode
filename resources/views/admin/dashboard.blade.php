@extends('admin.layouts.master')

@section('content')

     
    
    
    @if(Auth::user()->role_id==2)
    
    <div class="row text-center">
		<div class="small-12 medium-8 medium-offset-2 columns">
			<i class="fa fa-home"></i>
			<h1 class="text-semibold padder-top-none">Add Properties</h1>
			<p class="intro-text buffer-bottom-small">
				Add a property to start collecting rent, market a vacancy, or collect applications.
			</p>
		</div>

		<div class="small-12 medium-4 medium-offset-4 columns padder-small">
			<a href="{{url('admin/property')}}" class="btn" id="addProperty">Add a Property</a>
		</div>

		<div class="small-12 columns padder-top-small">
			<hr>
			<p class="intro-text padder-top-large buffer-bottom-small">Looking for more info?</p>
			<a href="#" class="text-semibold" target="_blank">Learn about properties</a>
		</div>
	</div>
    
    @endif
    
@endsection