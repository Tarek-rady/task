<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo.png')}}" alt="" height="100" width="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">{{ __('models.menu') }}</span></li>

                {{--  dashboard  --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">{{ __('models.home') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link" data-key="t-analytics">{{ __('models.home') }}</a>
                            </li>

                        </ul>
                    </div>
                </li>

                @if(auth('admin')->user()->hasPermission('roles-read'))
                    {{--  roles  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#roles" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="roles">
                            <i class="ri-mail-star-fill"></i> <span data-key="t-pages">{{ __('models.roles') }}</span>
                        </a>


                        <div class="collapse menu-dropdown" id="roles">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.roles') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_role') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('admins-read'))
                    {{--  admins  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#admins" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="admins">
                            <i class="ri-creative-commons-by-line"></i> <span data-key="t-pages">{{ __('models.admins') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="admins">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.admins.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.admins') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.admins.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_admin') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif



                @if(auth('admin')->user()->hasPermission('users-read'))
                    {{--  users  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#users" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="users">
                            <i class=" ri-creative-commons-by-fill"></i> <span data-key="t-pages">{{ __('models.users') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="users">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.users') }} </a>
                                </li>



                            </ul>
                        </div>
                    </li>
                @endif


                @if(auth('admin')->user()->hasPermission('categories-read'))
                    {{--  categories  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#categories" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="categories">
                            <i class=" ri-creative-commons-by-fill"></i> <span data-key="t-pages">{{ __('models.categories') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="categories">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.categories') }} </a>
                                </li>



                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('products-read'))
                    {{--  products  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#products" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="products">
                            <i class=" ri-creative-commons-by-fill"></i> <span data-key="t-pages">{{ __('models.products') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="products">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.products') }} </a>
                                </li>



                            </ul>
                        </div>
                    </li>
                @endif


                    {{--  orders  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#orders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="orders">
                            <i class=" ri-creative-commons-by-fill"></i> <span data-key="t-pages">{{ __('models.orders') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="orders">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.orders') }} </a>
                                </li>



                            </ul>
                        </div>
                    </li>
















            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
