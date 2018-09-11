@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            @can('clip_managment_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-video-camera"></i>
                    <span>@lang('global.clip-managment.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('clip_access')
                    <li>
                        <a href="{{ route('admin.clips.index') }}">
                            <i class="fa fa-video-camera"></i>
                            <span>@lang('global.clips.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('gallery_access')
                    <li>
                        <a href="{{ route('admin.galleries.index') }}">
                            <i class="fa fa-file-video-o"></i>
                            <span>@lang('global.gallery.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('detection_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-search"></i>
                            <span>@lang('global.detections.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('single_channel_access')
                            <li>
                                <a href="{{ route('admin.single_channels.index') }}">
                                    <i class="fa fa-search-plus"></i>
                                    <span>@lang('global.single-channel.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('multi_channel_access')
                            <li>
                                <a href="{{ route('admin.multi_channels.index') }}">
                                    <i class="fa fa-search-plus"></i>
                                    <span>@lang('global.multi-channel.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('all_channel_access')
                            <li>
                                <a href="{{ route('admin.all_channels.index') }}">
                                    <i class="fa fa-search-plus"></i>
                                    <span>@lang('global.all-channels.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('default_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.defaults.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('clip_filter_access')
                    <li>
                        <a href="{{ route('admin.clip_filters.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.clip-filters.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('state_access')
                    <li>
                        <a href="{{ route('admin.states.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.states.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('brand_access')
                    <li>
                        <a href="{{ route('admin.brands.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.brands.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('product_access')
                    <li>
                        <a href="{{ route('admin.products.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.products.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('industry_access')
                    <li>
                        <a href="{{ route('admin.industries.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.industry.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('nuts_bolt_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.nuts-bolts.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('dyna_video_cut_access')
                    <li>
                        <a href="{{ route('admin.dyna_video_cuts.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.dyna-video-cut.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('google_cloud_vision_access')
                    <li>
                        <a href="{{ route('admin.google_cloud_visions.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.google-cloud-vision.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('image_magic_access')
                    <li>
                        <a href="{{ route('admin.image_magics.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.image-magic.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('tocai_server_access')
                    <li>
                        <a href="{{ route('admin.tocai_servers.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.tocai-server.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('interactivity_access')
                    <li>
                        <a href="{{ route('admin.interactivities.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.interactivity.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('register_new_clip_access')
                    <li>
                        <a href="{{ route('admin.register_new_clips.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.register-new-clip.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('dedup_access')
                    <li>
                        <a href="{{ route('admin.dedups.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.dedup.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('redistribution_access')
                    <li>
                        <a href="{{ route('admin.redistributions.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.redistribution.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('auto_group_detection_access')
                    <li>
                        <a href="{{ route('admin.auto_group_detections.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.auto-group-detection.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

