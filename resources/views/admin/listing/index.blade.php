@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.listing.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($listing->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>propertyId</th>
<th>propertytype</th>
<th>bedrooms</th>
<th>Full-bathroom</th>
<th>Half-bathroom</th>
<th>Sq Footage</th>
<th>headline</th>
<th>Description</th>
<th>petPolicy</th>
<th>Feature Amenities</th>
<th>Any Other Amenities</th>
<th>monthRent</th>
<th>securityRent</th>
<th>In Month Duration</th>
<th>when Avaliable</th>
<th>move In date</th>
<th>video Link</th>
<th>Screening Credit</th>
<th>background Check</th>
<th>shortLink</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($listing as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->property->unit_name) ? $row->property->unit_name : '' }}</td>
<td>{{ isset($row->propertytype->name) ? $row->propertytype->name : '' }}</td>
<td>{{ $row->bedrooms }}</td>
<td>{{ $row->full_bathroom }}</td>
<td>{{ $row->half_bathroom }}</td>
<td>{{ $row->sq_footage }}</td>
<td>{{ $row->headline }}</td>
<td>{{ $row->description }}</td>
<td>{{ isset($row->petpolicy->name) ? $row->petpolicy->name : '' }}</td>
<td>{{ isset($row->featuresamenities->name) ? $row->featuresamenities->name : '' }}</td>
<td>{{ $row->any_other_amenities }}</td>
<td>{{ $row->month_rent }}</td>
<td>{{ $row->security_rent }}</td>
<td>{{ $row->in_month_duration }}</td>
<td>{{ $row->when_avaliable }}</td>
<td>{{ $row->move_in_date }}</td>
<td>{{ $row->video_link }}</td>
<td>{{ $row->screening_credit }}</td>
<td>{{ $row->background_check }}</td>
<td>{{ $row->short_link }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.listing.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.listing.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.listing.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop