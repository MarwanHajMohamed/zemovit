<div class="sidebar p-2 sidebar-img-bg py-md-3 @@cardClass">
    <div class="container-fluid">

        <div class="title-text d-flex align-items-center mb-4 mt-1">
            <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt"></span>
                <span>
                    @if (isset($settings) && isset($settings->website_name))
                        {{ $settings->website_name }}
                    @endif
                </span>
            </h4>
            {{-- <div class="dropdown morphing scale-right">
                 <a class="dropdown-toggle more-icon" href="#" role="button" data-bs-toggle="dropdown"><i
                         class="fa fa-ellipsis-h"></i></a>
                 <ul class="dropdown-menu shadow border-0 p-2 mt-2" data-bs-popper="none">
                     <li class="fw-bold px-2">روابط سريعة </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                 </ul>
             </div> --}}
        </div>


        <div class="main-menu flex-grow-1">

            <ul class="menu-list nav-sidebar">
                <li class="divider py-2 lh-sm"><span class="small">{{ trans('auth.dashboard') }} </span><br> <small
                        class="text-muted">
                        {{ $main_setting->sidebar_text ?? __('auth.develop_design') . 'NAMI' }}
                    </small></li>
                <li>
                    <a class="m-link {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <i class="fa fa-home"></i>
                        <span class="ms-2">{{ trans('auth.home') }} </span>
                    </a>
                </li>

                <!-- general settings -->
                @if (checkIfHasPermission('settings-read'))
                    <li>
                        <a class="m-link {{ Route::currentRouteName() == 'settings.index' ? 'active' : '' }}"
                            href="{{ route('settings.index') }}">
                            <i class="fa fa-cogs"></i>
                            <span class="ms-2">{{ __('auth.site_settings') }} </span>
                        </a>
                    </li>
                @endif
                {{-- <li class="collapsed">
                    <a class="m-link
                    {{ in_array(Route::currentRouteName(), ['settings.index', 'file-manager-user.index']) ? 'active' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#general-setting" href="#"
                        aria-expanded="{{ in_array(Route::currentRouteName(), ['settings.index', 'file-manager-user.index']) ? 'true' : '' }}">
                        <i class="fa fa-cogs"></i>
                        <span class="ms-2">{{ trans('auth.general_settings') }} </span>
                        <span class="arrow fa fa-angle-left ms-auto text-end"></span>
                    </a>
                    <ul class="sub-menu collapse
                    {{ in_array(Route::currentRouteName(), ['settings.index', 'file-manager-user.index']) ? 'show' : '' }}"
                        id="general-setting">

                        <li>
                            <a class="m-link {{ Route::currentRouteName() == 'file-manager-user.index' ? 'active' : '' }}"
                                href="{{ route('file-manager-user.index') }}">
                                <i class="fa fa-file-archive-o"></i>
                                <span class="ms-2">{{ __('auth.file_manager') }} </span>
                            </a>
                        </li>

                    </ul>
                </li> --}}
                <!-- general settings -->
                <!-- developer settings -->
                @if (auth('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value)
                    <li class="collapsed">
                        <a class="m-link
                    {{ in_array(Route::currentRouteName(), ['env.index', 'file-manager.index', 'terminal.index', 'commands.index', 'main-settings.index']) ? 'active' : '' }}"
                            data-bs-toggle="collapse" data-bs-target="#my_dashboard1" href="#"
                            aria-expanded="{{ in_array(Route::currentRouteName(), ['env.index', 'file-manager.index', 'terminal.index', 'commands.index', 'main-settings.index']) ? 'true' : '' }}">
                            <i class="fa fa-cogs"></i>
                            <span class="ms-2">{{ trans('auth.system_settings') }} </span>
                            <span class="arrow fa fa-angle-left ms-auto text-end"></span>
                        </a>
                        <ul class="sub-menu collapse
                    {{ in_array(Route::currentRouteName(), ['env.index', 'file-manager.index', 'terminal.index', 'commands.index', 'main-settings.index']) ? 'show' : '' }}"
                            id="my_dashboard1">
                            <li>
                                <a class="m-link {{ Route::currentRouteName() == 'env.index' ? 'active' : '' }}"
                                    href="{{ route('env.index') }}">
                                    <i class="fa fa-cogs"></i>
                                    <span class="ms-2"> env </span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::currentRouteName() == 'file-manager.index' ? 'active' : '' }}"
                                    href="{{ route('file-manager.index') }}">
                                    <i class="fa fa-file-archive-o"></i>
                                    <span class="ms-2">{{ __('auth.file_manager') }} </span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::currentRouteName() == 'terminal.index' ? 'active' : '' }}"
                                    href="{{ route('terminal.index') }}">
                                    <i class="fa fa-terminal"></i>
                                    <span class="ms-2">{{ __('auth.terminal') }} </span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::currentRouteName() == 'commands.index' ? 'active' : '' }}"
                                    href="{{ route('commands.index') }}">
                                    <i class="fa fa-terminal"></i>
                                    <span class="ms-2">{{ __('auth.commands') }} </span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::currentRouteName() == 'main-settings.index' ? 'active' : '' }}"
                                    href="{{ route('main-settings.index') }}">
                                    <i class="fa fa-cog"></i>
                                    <span class="ms-2">{{ __('auth.main_settings') }} </span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::currentRouteName() == 'main-settings.index' ? 'active' : '' }}"
                                    href="{{ url('/log-viewer') }}" target="_blank">
                                    <i class="fa fa-cog"></i>
                                    <span class="ms-2">log viewer </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!-- developer settings -->

                {{-- permissions --}}
                @if (checkIfHasPermission('roles-read'))
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#adminsandroles" href="#">
                            <i class="icon-lock"></i>
                            <span class="ms-2"> {{ __('permission.users and roles') }} </span>
                            <span class="arrow fa fa-angle-left ms-auto text-end"></span>
                        </a>
                        <ul class="sub-menu collapse
                    {{ in_array(Route::currentRouteName(), ['permissions.index','roles.index', 'roles.create', 'roles.edit', 'admins.index']) ? 'show' : '' }}"
                            id="adminsandroles">

                            @if (checkIfHasPermission('admins-read'))
                                <li>
                                    <a class="m-link {{ Route::currentRouteName() == 'admins.index' ? 'active' : '' }}"
                                        href="{{ route('admins.index') }}">
                                        <i class="icon-user"></i>
                                        <span class="ms-2"> {{ __('auth.users') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth('admin')->user()->admin_type == \App\Enums\AdminTypeisEnum::Developer->value)
                                <li>
                                    <a class="m-link {{ Route::currentRouteName() == 'permissions.index' ? 'active' : '' }}"
                                        href="{{ route('permissions.index') }}">
                                        <i class="icon-lock"></i>
                                        <span class="ms-2"> {{ __('permission.permissions') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if (checkIfHasPermission('roles-read'))
                                <li>
                                    <a class="m-link {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.create', 'roles.edit']) ? 'active' : '' }}"
                                        href="{{ route('roles.index') }}">
                                        <i class="icon-lock"></i>
                                        <span class="ms-2"> {{ __('permission.roles') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                {{-- end permissions --}}


                {{-- side bar  --}}
                @php
                    $resources = [
                            'seo-settings' => [
                                'icon' => 'fa-chart-line', // تحسين محركات البحث - خط بياني يعبر عن التحسين
                                'label' => __('zemovit.seo_settings'),
                                'permission' => 'seo-settings-read'
                            ],
                            'home-settings' => [
                                  'icon' => 'fa-tools', // إعدادات الصفحة الرئيسية - منزل مع علامة تحقق
                                  'label' => __('zemovit.home_settings'),
                                  'permission' => 'home-settings-read'
                            ],
                            'banners' => [
                                'icon' => 'fa-images', // سلايدر صور
                                'label' => __('zemovit.banners'),
                                'permission' => 'banners-read'
                            ],
                             'why-choose-us' => [
                                'icon' => 'fa-star', // star icon for "Why Choose Us"
                                'label' => __('zemovit.why-choose-us'),
                                'permission' => 'why-choose-us-read'
                            ],
                            'abouts' => [
                                'icon' => 'fa-circle-info', // معلومات عنا
                                'label' => __('zemovit.about_us'),
                                'permission' => 'abouts-read'
                            ],
                               'missions' => [
                                'icon' => 'fa-bullseye', // معلومات عنا
                                'label' => __('zemovit.missions'),
                                'permission' => 'missions-read'
                            ],
                             'visions' => [
                                'icon' => 'fa-eye', // معلومات عنا
                                'label' => __('zemovit.visions'),
                                'permission' => 'visions-read'
                            ],
                             'blogs' => [
                                'icon' => 'fa-blog', // معلومات عنا
                                'label' => __('zemovit.blogs'),
                                'permission' => 'blogs-read'
                            ],
                             'therapeutic_areas' => [
                                'icon' => 'fa-box-open', // منتجات
                                'label' => __('zemovit.therapeutic_areas'),
                                'permission' => 'therapeutic_areas-read'
                            ],
                            'products' => [
                                'icon' => 'fa-box-open', // منتجات
                                'label' => __('zemovit.products'),
                                'permission' => 'products-read'
                            ],

                                 'products-benefits' => [
                                'icon' => 'fa-thumbs-up', // thumbs up for benefits
                                'label' => __('zemovit.products-benefits'),
                                'permission' => 'why-choose-us-read'
                            ],
                            'products-details' => [
                                'icon' => 'fa-info-circle', // info icon for details
                                'label' => __('zemovit.products-details'),
                                'permission' => 'why-choose-us-read'
                            ],
                            'contacts' => [
                                'icon' => 'fa-envelope', // تواصل معنا
                                'label' => __('zemovit.contacts'),
                                'permission' => 'contacts-read'
                            ],
//                             'faqs' => [
//                                'icon' => 'fa-envelope', // تواصل معنا
//                                'label' => __('zemovit.faqs'),
//                                'permission' => 'faqs-read'
//                            ],




                    ];
                @endphp

                @foreach ($resources as $route => $data)
                    @if (isset($data['childrens']) && count($data['childrens']) > 0)
                        @php
                            $resources_names = getAllChildrensRouteNames($data['childrens']);
                            $resources_permissions = getAllChildrensRoutePermission($data['childrens']);
                            $group_current_route_name = explode('.',Route::currentRouteName())[0];
                            $goroup_active = in_array($group_current_route_name, $resources_names);
                        @endphp
                        @if (checkIfHasMultiplePermission($resources_permissions))
                            <li class="collapsed">
                                <a class="m-link {{ $goroup_active ? 'active' : '' }}"
                                    data-bs-toggle="collapse" data-bs-target="#{{ $route }}" href="#"
                                    aria-expanded="{{ $goroup_active ? 'true' : '' }}">
                                    <i class="fa {{ $data['icon'] }}"></i>
                                    <span class="ms-2">{{ $data['label'] }} </span>
                                    <span class="arrow fa fa-angle-left ms-auto text-end"></span>
                                </a>
                                <ul class="sub-menu collapse {{ $goroup_active ? 'show' : '' }}"
                                    id="{{ $route }}">
                                    @php renderNestedMenu($data['childrens'], $route); @endphp
                                </ul>
                            </li>
                        @endif
                    @else
                        @if (checkIfHasPermission($data['permission']) && !isset($data['notVisible']))
                            @php
                                $active = false;
                                if(isset($data['otherActive']) && count($data['otherActive'])) {
                                    $other_active = $data['otherActive'];
                                    $current_route_name = explode('.',Route::currentRouteName())[0];
                                    $active = in_array($current_route_name, $other_active);
                                }
                            @endphp
                            <li>
                                <a class="m-link {{ Str::startsWith(Route::currentRouteName(), $route . '.') || $active ? 'active' : '' }}"
                                    href="{{ route($route . '.index') }}">
                                    <i class="fa {{ $data['icon'] }}"></i>
                                    <span class="ms-2">{{ $data['label'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach
                {{-- end side bar --}}
            </ul>
        </div>


        <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
            <li class="nav-item flex-fill p-2">
                @if (checkIfHasPermission('settings-read'))
                    <a class="d-inline-block w-100 color-400" href="{{ route('settings.index') }}">
                    <i class="fa fa-cogs"></i>
                    </a>
                @endif
            </li>
            <li class="nav-item flex-fill p-2">
                <a class="d-inline-block w-100 color-400" href="{{ route('admin.logout') }}" title="sign-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z" />
                        <path class="fill-secondary"
                            d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>
