@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($listing, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.listing.update', $listing->id))) !!}

<div class="form-group">
    {!! Form::label('property_id', 'propertyId', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('property_id', $property, old('property_id',$listing->property_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('propertytype_id', 'propertytype', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('propertytype_id', $propertytype, old('propertytype_id',$listing->propertytype_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('bedrooms', 'bedrooms', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('bedrooms', old('bedrooms',$listing->bedrooms), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('full_bathroom', 'Full-bathroom', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('full_bathroom', old('full_bathroom',$listing->full_bathroom), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('half_bathroom', 'Half-bathroom', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('half_bathroom', old('half_bathroom',$listing->half_bathroom), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sq_footage', 'Sq Footage', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sq_footage', old('sq_footage',$listing->sq_footage), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('headline', 'headline', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('headline', old('headline',$listing->headline), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('description', old('description',$listing->description), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('petpolicy_id', 'petPolicy', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('petpolicy_id', $petpolicy, old('petpolicy_id',$listing->petpolicy_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('featuresamenities_id', 'Feature Amenities', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('featuresamenities_id', $featuresamenities, old('featuresamenities_id',$listing->featuresamenities_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('any_other_amenities', 'Any Other Amenities', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('any_other_amenities', old('any_other_amenities',$listing->any_other_amenities), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('month_rent', 'monthRent', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('month_rent', old('month_rent',$listing->month_rent), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('security_rent', 'securityRent', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('security_rent', old('security_rent',$listing->security_rent), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('in_month_duration', 'In Month Duration', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('in_month_duration', old('in_month_duration',$listing->in_month_duration), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('when_avaliable', 'when Avaliable', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('when_avaliable', old('when_avaliable',$listing->when_avaliable), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('move_in_date', 'move In date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('move_in_date', old('move_in_date',$listing->move_in_date), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('video_link', 'video Link', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('video_link', old('video_link',$listing->video_link), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('screening_credit', 'Screening Credit', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('screening_credit', old('screening_credit',$listing->screening_credit), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('background_check', 'background Check', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('background_check', old('background_check',$listing->background_check), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('short_link', 'shortLink', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('short_link', old('short_link',$listing->short_link), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.listing.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection