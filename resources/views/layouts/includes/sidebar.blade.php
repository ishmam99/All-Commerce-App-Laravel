<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
  <!--begin::Brand-->
  <div class="brand flex-column-auto" id="kt_brand">
    <!--begin::Logo-->
    <a href="{{ asset('dashboard') }}" class="brand-logo" style="height: 100%">
      @if($company->logo)
        <img alt="{{ $company->name }}" src="{{ asset('storage/' . $company->logo) }}" style="height: 100%; width: auto">
      @else
        <h1 class="py-5 px-2">{{ $company->name }}</h1>
      @endif
    </a>
    <!--end::Logo-->
    <!--begin::Toggle-->
    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
      <span class="svg-icon svg-icon svg-icon-xl">
        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path
              d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
              fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
            <path
              d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
          </g>
        </svg>
      </span>
    </button>
    <!--end::Toolbar-->
  </div>
  <!--end::Brand-->
  <!--begin::Aside Menu-->
  <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
      <!--begin::Menu Nav-->
      <ul class="menu-nav">
        @can('store.all')
          <li class="menu-item {{ request()->is(['dashboard']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">
            <a href="{{ route('dashboard') }}" class="menu-link">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path
                      d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                      fill="#000000" fill-rule="nonzero"/>
                    <path
                      d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                      fill="#000000" opacity="0.3"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Dashboard</span>
            </a>
          </li>
        @endcan
        @canany(['purchase.all', 'purchase.add', 'purchase.view', 'purchase.edit', 'purchase.delete', 'purchase.return'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/warehouse/purchase*', 'dashboard/warehouse/stock']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                      d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                      fill="#000000"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Purchase Goods</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <i class="menu-arrow"></i>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link">
                    <span class="menu-text">Purchase Goods</span>
                  </span>
                </li>
                <li class="menu-item {{ request()->routeIs(['purchase.create', 'purchase.edit']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">
                  <a href="{{ route('purchase.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">New Purchase</span>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('purchase.index') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">
                  <a href="{{ route('purchase.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Purchase List</span>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('purchase_return.*') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">
                  <a href="{{route('purchase_return.index')}}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Purchase Return</span>
                  </a>
                </li>

                {{--                <li class="menu-item {{ request()->is('dashboard/warehouse/stock') ? 'menu-item-active' : null }}" aria-haspopup="true">--}}
                {{--                  <a href="{{ route('warehouse.stock') }}" class="menu-link">--}}
                {{--                    <i class="menu-bullet menu-bullet-dot">--}}
                {{--                      <span></span>--}}
                {{--                    </i>--}}
                {{--                    <span class="menu-text">Products Stock</span>--}}
                {{--                  </a>--}}
                {{--                </li>--}}
              </ul>
            </div>
          </li>
        @endcanany
        @canany(['warehouse.all','warehouse.add','warehouse.view','warehouse.edit','warehouse.delete'])
          <li class="menu-item menu-item-submenu {{ request()->is('dashboard/warehouse*') && !request()->is(['dashboard/warehouse/stock', 'dashboard/warehouse/purchase', 'dashboard/warehouse/purchase/*', 'dashboard/warehouse/purchase_return', 'dashboard/warehouse/purchase_return/*']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                      d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                      fill="#000000"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Warehouse</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <i class="menu-arrow"></i>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link">
                    <span class="menu-text">Warehouse</span>
                  </span>
                </li>
                {{--                @canany(['purchase.all','purchase.add','purchase.view','purchase.edit','purchase.delete'])--}}
                {{--                  <li class="menu-item menu-item-submenu  {{ request()->is(['dashboard/warehouse/purchase*']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-menu-toggle="hover">--}}
                {{--                    <a href="javascript:;" class="menu-link menu-toggle">--}}
                {{--                      <i class="menu-bullet menu-bullet-dot">--}}
                {{--                        <span></span>--}}
                {{--                      </i>--}}
                {{--                      <span class="menu-text">Purchase Goods</span>--}}
                {{--                      <i class="menu-arrow"></i>--}}
                {{--                    </a>--}}
                {{--                    <div class="menu-submenu">--}}
                {{--                      <i class="menu-arrow"></i>--}}
                {{--                      <ul class="menu-subnav">--}}
                {{--                        <li class="menu-item {{ request()->routeIs('purchase.index') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">--}}
                {{--                          <a href="{{ route('purchase.index') }}" class="menu-link">--}}
                {{--                            <i class="menu-bullet menu-bullet-dot">--}}
                {{--                              <span></span>--}}
                {{--                            </i>--}}
                {{--                            <span class="menu-text">All Purchase</span>--}}
                {{--                          </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="menu-item {{ request()->routeIs('purchase.create') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">--}}
                {{--                          <a href="{{route('purchase.create')}}" class="menu-link">--}}
                {{--                            <i class="menu-bullet menu-bullet-dot">--}}
                {{--                              <span></span>--}}
                {{--                            </i>--}}
                {{--                            <span class="menu-text">Purchase Now</span>--}}
                {{--                          </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="menu-item {{ request()->routeIs('purchase_return.*') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">--}}
                {{--                          <a href="{{route('purchase_return.index')}}" class="menu-link">--}}
                {{--                            <i class="menu-bullet menu-bullet-dot">--}}
                {{--                              <span></span>--}}
                {{--                            </i>--}}
                {{--                            <span class="menu-text">Purchase Return</span>--}}
                {{--                          </a>--}}
                {{--                        </li>--}}
                {{--                      </ul>--}}

                {{--                    </div>--}}
                {{--                  </li>--}}
                {{--                @endcanany--}}
                @canany(['warehouse.all','warehouse.add','warehouse.view','warehouse.edit','warehouse.delete'])
                  <li class="menu-item {{ request()->is('dashboard/warehouse/assignproduct') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('warehouse.assign') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Warehouse to Store</span>
                    </a>
                  </li>
                  <li class="menu-item {{ request()->is('dashboard/warehouse/records*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('warehouse.records') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Warehouse to Store Records</span>
                    </a>
                  </li>
                @endcanany
              </ul>
            </div>
          </li>
        @endcanany
        @canany(['store.create', 'store.show', 'store.edit', 'store.delete'])
          <li class="menu-item menu-item-submenu {{ (request()->is(['dashboard/store*']) && !request()->is(['dashboard/store/purchase*'])) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                      d="M21,10 L3,10 L3,5 C3,4.44771525 3.44771525,4 4,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,10 Z M16,6 C15.4477153,6 15,6.44771525 15,7 C15,7.55228475 15.4477153,8 16,8 C16.5522847,8 17,7.55228475 17,7 C17,6.44771525 16.5522847,6 16,6 Z M8,6 C8.55228475,6 9,6.44771525 9,7 C9,7.55228475 8.55228475,8 8,8 C7.44771525,8 7,7.55228475 7,7 C7,6.44771525 7.44771525,6 8,6 Z M21,11 L21,21 C21,21.5522847 20.5522847,22 20,22 L4,22 C3.44771525,22 3,21.5522847 3,21 L3,11 L21,11 Z M8,13 C7.44771525,13 7,13.5223345 7,14.1666667 L7,18.8333333 C7,19.4776655 7.44771525,20 8,20 L16,20 C16.5522847,20 17,19.4776655 17,18.8333333 L17,14.1666667 C17,13.5223345 16.5522847,13 16,13 L8,13 Z"
                      fill="#000000"/>
                    <path d="M6,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L5,4 C5,3.44771525 5.44771525,3 6,3 Z M16,3 L18,3 C18.5522847,3 19,3.44771525 19,4 L15,4 C15,3.44771525 15.4477153,3 16,3 Z" fill="#000000"
                          opacity="0.3"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Manage Store</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <i class="menu-arrow"></i>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link">
                    <span class="menu-text">Manage Store</span>
                  </span>
                </li>
                @canany(['store.create', 'store.edit', 'store.show', 'store.delete'])
                  <li class="menu-item {{ request()->is('dashboard/store') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('store.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Stores</span>
                    </a>
                  </li>
                @endcanany
                @canany(['store.assign-employee'])
                  <li class="menu-item {{ request()->is('dashboard/store/assignemployee*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('store.assignemployee') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Assign Emp to Store</span>
                    </a>
                  </li>
                @endcanany
              </ul>
            </div>
          </li>
        @endcanany

        @canany(['customer.create','customer.edit','customer.show','customer.delete'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/admin*', 'dashboard/employee*', 'dashboard/supplier*', 'dashboard/customer*', 'dashboard/role*']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                      d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                      fill="#000000" opacity="0.3"/>
                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                    <path
                      d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                      fill="#000000" opacity="0.3"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Manage Users</span>
              <i class="menu-arrow"></i>

            </a>
            <div class="menu-submenu">
              <span class="menu-arrow"></span>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link"><span class="menu-text">Manage Users</span></span>
                </li>

                @canany(['admin.create','admin.edit','admin.show','admin.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/admin*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('admin.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Admins</span>
                    </a>
                  </li>
                @endcanany
                @canany(['employee.create','employee.edit','employee.show','employee.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/employee*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('employee.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Employees</span>
                    </a>
                  </li>
                @endcanany
                @canany(['supplier.create','supplier.edit','supplier.show','supplier.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/supplier*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('supplier.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Suppliers</span>
                    </a>
                  </li>
                @endcanany
                @canany(['customer.create','customer.edit','customer.show','customer.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/customer*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('customer.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Customers</span>
                    </a>
                  </li>
                @endcanany

                @if(auth()->user()->hasRole('Super Admin'))
                  <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/role*']) ? 'menu-item-open menu-item-active' : null }}"
                      aria-haspopup="true"
                      data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="menu-link menu-toggle">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Role & Permission</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                      <span class="menu-arrow"></span>
                      <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                          <span class="menu-link"><span class="menu-text">Role & Permission</span></span>
                        </li>
                        <li class="menu-item menu-item {{ request()->is('dashboard/role') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                          <a href="{{ route('role.index') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                              <span></span>
                            </i>
                            <span class="menu-text">Add Role</span>
                          </a>
                        </li>
                        <li class="menu-item menu-item {{ request()->is('dashboard/role/assign') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                          <a href="{{ route('role.assign') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-dot">
                              <span></span>
                            </i>
                            <span class="menu-text">Assign Role</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                @endif
              </ul>
            </div>
          </li>
        @endcanany
        @canany(['sale.all','sale.add','sale.view','sale.edit','sale.delete'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/sale*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="javascript:" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <polygon fill="#000000" opacity="0.3"
                             points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>
                    <polygon fill="#000000" points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>
                    <path
                      d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866"
                      fill="#000000" opacity="0.3"/>
                    <path
                      d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z"
                      fill="#000000" opacity="0.3"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Sale</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <span class="menu-arrow"></span>
              <ul class="menu-subnav">
                @canany(['sale.all','sale.view','sale.edit','sale.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/sale') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('sale.index') }}" class="menu-link"><i
                        class="menu-bullet menu-bullet-dot"></i>
                      <span class="menu-text">All Sale</span>
                    </a>
                  </li>
                @endcanany
                @canany(['sale.all','sale.add',])
                  <li class="menu-item menu-item {{ request()->is('dashboard/sale/create') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{route('sale.create')}}" class="menu-link"><i
                        class="menu-bullet menu-bullet-dot"></i>
                      <span class="menu-text">Sale Now</span>
                    </a>
                  </li>
                @endcanany
                @canany(['sale.all','sale.add',])
                  <li class="menu-item menu-item {{ request()->routeIs('sale.returns') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{route('sale.returns')}}" class="menu-link"><i
                        class="menu-bullet menu-bullet-dot"></i>
                      <span class="menu-text">Sale Returns</span>
                    </a>
                  </li>
                @endcanany
              </ul>
            </div>
          </li>
        @endcanany
           <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/payment*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="{{route('payment.index')}}" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <i class="fa fa-list-alt"></i>
              </span>
              <span class="menu-text">Manage Payments</span>
              <i class="menu-arrow"></i>
            </a>
           </li>
           <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/prebook*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="{{route('prebook.index')}}" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <i class="fa fa-list-alt"></i>
              </span>
              <span class="menu-text">Prebook</span>
              <i class="menu-arrow"></i>
            </a>
           </li>
           <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/preorder*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="{{route('preorder.index')}}" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <i class="fa fa-list-alt"></i>
              </span>
              <span class="menu-text">Pre Order</span>
              <i class="menu-arrow"></i>
            </a>
           </li>
        @canany(['order.change-status', 'order.show'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/order*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="javascript:" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <i class="fa fa-list-alt"></i>
              </span>
              <span class="menu-text">Manage Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <span class="menu-arrow"></span>
              <ul class="menu-subnav">
                @can('order.show')
                  <li class="menu-item {{ request()->is('dashboard/order*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('order.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Order List</span>
                    </a>
                  </li>
                @endcan
              </ul>
            </div>
          </li>
        @endcanany

        @canany(['product.all','product.add','product.edit','product.delete','product.view',
        'category.all','category.add','category.edit','category.delete','category.view',
        'subject.all','subject.add','subject.edit','subject.delete','subject.view',
        'feature.all','feature.add','feature.edit','feature.delete','feature.view',
        'feature-category.all','feature-category.add','feature-category.edit','feature-category.delete','feature-category.view',
        'language.all','language.add','language.edit','language.delete','language.view',
        'tag.all','tag.add','tag.edit','tag.delete','tag.view',
        'format.all','format.add','format.edit','format.delete','format.view',
        'promotion.all','promotion.add','promotion.edit','promotion.delete','promotion.view',
        ])
          <li
            class="menu-item menu-item-submenu {{ request()->is(['dashboard/promotions*', 'dashboard/product*', 'dashboard/unit*', 'dashboard/tag*', 'dashboard/format*', 'dashboard/language*', 'dashboard/subject*', 'dashboard/category*', 'dashboard/subcategory*', 'dashboard/subSubcategory*', 'dashboard/feature*', 'dashboard/coupon*', 'dashboard/stock*']) ? 'menu-item-open menu-item-active' : null }}"
            aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="javascript:" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                      d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                      fill="#000000"/>
                    <path
                      d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                      fill="#000000" opacity="0.3"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Manage Products</span>
              <i class="menu-arrow"></i></a>
            <div class="menu-submenu">
              <span class="menu-arrow"></span>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link"><span class="menu-text">Manage Products</span></span>
                </li>
                @canany(['product.all','product.add','product.view','product.edit','product.delete',])
                  <li class="menu-item menu-item {{ request()->is('dashboard/product*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('product.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">All Products</span>
                    </a>
                  </li>
                @endcanany
                @canany(['attribute.all','attribute.add','attribute.view','attribute.edit','attribute.delete',])
                  <li class="menu-item menu-item {{ request()->is('dashboard/product*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('product.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">All Products</span>
                    </a>
                  </li>
                @endcanany
                @canany(['unit.all','unit.add','unit.view','unit.edit','unit.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/unit*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('unit.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Unit</span>
                    </a>
                  </li>
                @endcanany
                @canany(['feature.all','feature.add','feature.view','feature.edit','feature.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/feature*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('feature.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Features</span>
                    </a>
                  </li>
                @endcanany
                @canany(['category.all','category.add','category.view','category.edit','category.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/category*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('category.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Category</span>
                    </a>
                  </li>
                @endcanany
                @canany(['category.all','category.add','category.view','category.edit','category.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/subcategory*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('subcategory.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Sub Category</span>
                    </a>
                  </li>
                @endcanany
                @canany(['category.all','category.add','category.view','category.edit','category.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/subSubcategory*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('subSubcategory.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Sub Subcategory</span>
                    </a>
                  </li>
                @endcanany
                @canany(['tag.all','tag.add','tag.view','tag.edit','tag.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/tag*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('tag.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Tags</span>
                    </a>
                  </li>
                @endcanany
                @canany(['coupon.all','coupon.add','coupon.view','coupon.edit','coupon.delete'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/coupon*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('coupon.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Coupons</span>
                    </a>
                  </li>
                @endcanany

                @canany(['promotion.all', 'promotion.add', 'promotion.edit', 'promotion.delete', 'promotion.view'])
                  <li class="menu-item {{ request()->is('dashboard/promotions*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('promotions.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Promotions</span>
                    </a>
                  </li>
                @endcanany
              </ul>
            </div>
          </li>
        @endcanany

        @canany(['expense.all','expense.delete','expense.view', 'expense.edit'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/expense*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="javascript:" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                    <path
                      d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                      fill="#000000"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Expense</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <span class="menu-arrow"></span>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link"><span class="menu-text">Expense</span></span>
                </li>
                @canany(['expense.category.all','expense.category.delete','expense.category.view', 'expense.category.edit'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/expense-categories') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('expense-categories.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Expense Categories</span>
                    </a>
                  </li>
                @endcanany
                @canany(['expense.all','expense.delete','expense.view', 'expense.edit'])
                  <li class="menu-item menu-item {{ request()->is('dashboard/expenses*') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('expenses.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">All Expenses</span>
                    </a>
                  </li>
                @endcanany
              </ul>
            </div>
          </li>
        @endcanany


        @canany(['settings.all'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/company_settings*', 'dashboard/ecommerce_setting*', 'dashboard/banner*', 'dashboard/settings*']) ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path
                      d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                      fill="#000000"/>
                    <path
                      d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                      fill="#000000" opacity="0.3"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <i class="menu-arrow"></i>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link">
                    <span class="menu-text">Settings</span>
                  </span>
                </li>
                <li class="menu-item {{ request()->is('dashboard/company_settings*') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">
                  <a href="{{ route('company.edit') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">Company Settings</span>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('dashboard/ecommerce_setting*') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true">
                  <a href="{{ route('ecommerce.edit') }} " class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                      <span></span>
                    </i>
                    <span class="menu-text">E-commerce Settings</span>
                  </a>
                </li>

                @canany(['settings.slider.create', 'settings.slider.edit', 'settings.slider.delete'])
                  <li class="menu-item {{ request()->is('dashboard/settings/slider*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('settings.slider.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot"><span></span></i>
                      <span class="menu-text">Manage Slides</span>
                    </a>
                  </li>
                @endcanany

                @canany(['settings.video.create', 'settings.video.edit', 'settings.video.delete'])
                  <li class="menu-item {{ request()->is('dashboard/settings/video*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('settings.video.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot"><span></span></i>
                      <span class="menu-text">Manage Videos</span>
                    </a>
                  </li>
                @endcanany

                @canany(['settings.banner.create', 'settings.banner.edit', 'settings.banner.delete'])
                  <li class="menu-item {{ request()->is('dashboard/settings/banner*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('settings.banner.index') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot"><span></span></i>
                      <span class="menu-text">Manage Banners</span>
                    </a>
                  </li>
                @endcanany
              </ul>
            </div>
          </li>
        @endcanany

        @canany(['report.all', 'report.sale'])
          <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/report*']) ? 'menu-item-open menu-item-active' : null }}"
              aria-haspopup="true"
              data-ktmenu-submenu-toggle="hover">
            <a href="javascript:" class="menu-link menu-toggle">
              <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path
                      d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path
                      d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                      fill="#000000" fill-rule="nonzero"/>
                  </g>
                </svg>
              </span>
              <span class="menu-text">Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <span class="menu-arrow"></span>
              <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                  <span class="menu-link"><span class="menu-text">Report</span></span>
                </li>
                {{-- <li class="menu-item menu-item {{ request()->is('dashboard/income') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('post.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                        <span class="menu-text">Income</span>
                    </a>
                </li> --}}
                @canany(['report.all', 'report.sale', 'report.purchase', 'report.supplier', 'report.customer', 'report.expense'])
{{--                  <li class="menu-item menu-item-submenu {{ request()->is(['dashboard/report/profitloss*']) ? 'menu-item-open menu-item-active' : null }}"--}}
{{--                      aria-haspopup="true"--}}
{{--                      data-ktmenu-submenu-toggle="hover">--}}
{{--                    <a href="javascript:" class="menu-link menu-toggle">--}}
{{--                      <i class="menu-bullet menu-bullet-dot">--}}
{{--                        <span></span>--}}
{{--                      </i>--}}
{{--                      <span class="menu-text">Profit Loss</span>--}}
{{--                      <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="menu-submenu">--}}
{{--                      <span class="menu-arrow"></span>--}}
{{--                      <ul class="menu-subnav">--}}
{{--                        <li class="menu-item menu-item-parent" aria-haspopup="true">--}}
{{--                          <span class="menu-link"><span class="menu-text">Profit Loss</span></span>--}}
{{--                        </li>--}}
{{--                        @canany(['user.all','user.view','user.edit','user.delete',])--}}
{{--                          <li class="menu-item menu-item {{ request()->is('dashboard/report/profitloss/sale') ? 'menu-item-active' : null }}"--}}
{{--                              aria-haspopup="true">--}}
{{--                            <a href="{{ route('report.profitloss.sale') }}" class="menu-link">--}}
{{--                              <i class="menu-bullet menu-bullet-dot">--}}
{{--                                <span></span>--}}
{{--                              </i>--}}
{{--                              <span class="menu-text">Sale</span>--}}
{{--                            </a>--}}
{{--                          </li>--}}
{{--                        @endcanany--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                  </li>--}}

                  <li class="menu-item menu-item {{ request()->is('dashboard/report/purchase') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('report.purchase') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Purchase Reports</span>
                    </a>
                  </li>
                  <li class="menu-item menu-item {{ request()->is('dashboard/report/sale') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('report.sale') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Sale Reports</span>
                    </a>
                  </li>
                  <li class="menu-item menu-item {{ request()->is('dashboard/report/expense') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('report.expense') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Expense Reports</span>
                    </a>
                  </li>
                  <li class="menu-item menu-item {{ request()->is('dashboard/report/supplier') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('report.supplier') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Supplier Reports</span>
                    </a>
                  </li>
                  <li class="menu-item menu-item {{ request()->is('dashboard/report/customer') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('report.customer') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Customer Reports</span>
                    </a>
                  </li>
                  <li class="menu-item menu-item {{ request()->is('dashboard/report/stock') ? 'menu-item-active' : null }}"
                      aria-haspopup="true">
                    <a href="{{ route('report.stock') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Stock Report</span>
                    </a>
                  </li>
                @endcanany
              </ul>

            </div>
          </li>
        @endcanany

        @canany(['import.purchases'])
          <li class="menu-item menu-item-submenu {{ request()->is('dashboard/import*') ? 'menu-item-open menu-item-active' : null }}" aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle">
              <span class="menu-icon">
                <i class="fa fa-upload"></i>
              </span>
              <span class="menu-text">Import Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu">
              <i class="menu-arrow"></i>
              <ul class="menu-subnav">
                @can('import.purchases')
                  <li class="menu-item {{ request()->is('dashboard/import/purchases') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('import.purchases') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot"><span></span></i>
                      <span class="menu-text">Purchases</span>
                    </a>
                  </li>
                @endcan
              </ul>
            </div>
          </li>
        @endcanany

      </ul>
      <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
  </div>
  <!--end::Aside Menu-->
</div>
<!--end::Aside-->
