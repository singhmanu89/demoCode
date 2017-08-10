@extends('admin.layouts.master')

@section('content')

     
    
    
    @if(Auth::user()->role_id==2)
    
   <div class="row text-center ">
		<div class="small-12 medium-8 medium-offset-2 columns text-center">
			 
			<h1 class="text-semibold padder-top-none">Screen applicants at no cost to you</h1>
			<p class="intro-text buffer-bottom-small">
				Applicants pay only $24.99 per report (credit report or background check), or $39.99 for both. All you need is their name and email address to get started.
			</p>
		</div>

		<div class="small-12 medium-4 medium-offset-4 columns padder-small">
			<a href="#"  class="btn">Request Reports</a>
		</div>

	 
	</div>
    
    @endif
    
@endsection