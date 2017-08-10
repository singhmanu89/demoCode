<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
           
            @foreach($menus as $menu)
                @if($menu->menu_type != 2 && is_null($menu->parent_id))
                    @if(Auth::user()->role->canAccessMenu($menu))
                        <li @if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($menu->name)) class="active" @endif>
                            <a href="{{ route(config('quickadmin.route').'.'.strtolower($menu->name).'.index') }}">
                                <i class="fa {{ $menu->icon }}"></i>
                                <span class="title">{{ $menu->title }}</span>
                            </a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->role->canAccessMenu($menu) && !is_null($menu->children()->first()) && is_null($menu->parent_id))
                        <li>
                            <a href="#">
                                <i class="fa {{ $menu->icon }}"></i>
                                <span class="title">{{ $menu->title }}</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @foreach($menu['children'] as $child)
                                    @if(Auth::user()->role->canAccessMenu($child))
                                        <li
                                                @if(isset(explode('/',Request::path())[1]) && explode('/',Request::path())[1] == strtolower($child->name)) class="active active-sub" @endif>
                                            <a href="{{ route(strtolower(config('quickadmin.route').'.'.$child->name).'.index') }}">
                                                <i class="fa {{ $child->icon }}"></i>
                                                <span class="title">
                                                    {{ $child->title  }}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
           
            
            
            @if(Auth::user()->role_id==3)
                   <li> <a href="#"> <i class="fa fa-usd fa-fw"></i> Payments</a></li>
                   <li> <a href="{{url('/admin/listing/')}}"> <i class="fa fa-folder fa-fw"></i> Applications</a></li>
           <li> <a href="#"> <i class="fa fa-shield fa-fw"></i> Screening</a></li>
            <li> <a href="#"> <i class="fa fa-user fa-fw"></i> Renter Profile</a></li>    
            <li> <a href="#"> <i class="fa fa-university fa-fw"></i> Banks & Cards</a></li>    
		 @endif
                 
                 
			@if(Auth::user()->role_id==2)
                        
                         <li> <a href="{{url('/admin/property/create?')}}"> <i class="fa fa-home fa-fw"></i> Properties</a></li>
                          <li> <a href="{{url('/admin/lease/create?')}}"> <i class="fa fa-usd fa-fw"></i> Leases</a></li>
                          <li> <a href="{{url('/admin/recurringrent')}}"> <i class="fa fa-usd fa-fw"></i> Recurring Rent</a></li>                          
                           <li> <a href="{{url('/admin/listing/create?')}}"> <i class="fa fa-list-alt fa-fw"></i> Listings</a></li>
                            <li> <a href="{{url('/admin/listing/')}}"> <i class="fa fa-folder fa-fw"></i> Applications</a></li>
                             <li> <a href="{{url('/admin/screening')}}"> <i class="fa fa-shield fa-fw"></i> Screening</a></li>
                              <!--li> <a href="#"> <i class="fa fa-plus-square-o fa-fw"></i> Paid Services</a></li-->
                               <li> <a href="{{url('/admin/addanaccount')}}"> <i class="fa fa-university fa-fw"></i> Banks & Cards</a></li>                           
                                 <li> <a href="#">Export Payment Data</a></li>
		 @endif
 <li> <a href="#">Help center</a></li>
 <li> <a href="#">Contact support</a></li>
 <li> <a href="#">Terms of use</a></li>
 <li> <a href="#">Security and Privacy</a></li>

 
  <li>
                {!! Form::open(['url' => 'logout']) !!}
                <button type="submit" class="logout">
                    <i class="fa fa-sign-out fa-fw"></i>
                    <span class="title">{{ trans('quickadmin::admin.partials-sidebar-logout') }}</span>
                </button>
                {!! Form::close() !!}
            </li>
        </ul>
    </div>
</div>
