<nav id="sidebar" class="sidebar js-sidebar">
   <div class="sidebar-content js-simplebar">
      <a class="sidebar-brand" href="index.html">
         <span class="sidebar-brand-text">
            {{-- <i class="fas fa-cart-plus fa-lg me-3"></i> --}}
            <img src="{{ asset('img/icons/icon-48x48.png') }}" alt="logo-icon" width="34px" class="me-1">
            <span class="align-middle me-3" style="font-family: Poppins">CAFE NGOPAY</span>


         </span>
         {{-- <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter"
            color="#FFFFFF" style="margin-left: -3px">
            <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
            <path d="M20 12L12 16L4 12"></path>
            <path d="M20 16L12 20L4 16"></path>
         </svg> --}}
         <img src="{{ asset('img/icons/icon-48x48.png') }}" alt="logo-icon" width="32px" class="sidebar-brand-icon align-middle">




      </a>

      <div class="sidebar-user">
         <div class="d-flex justify-content-center">
            <div class="flex-shrink-0">
               <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
            </div>
            <div class="flex-grow-1 ps-2">
               <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  {{ Auth::user()->name }}
               </a>
               <div class="dropdown-menu dropdown-menu-start">
                  <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                  <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i>
                     Analytics</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                     Privacy</a>
                  <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i>
                     Help Center</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Log out</a>
               </div>

               <div class="sidebar-user-subtitle">{{ Auth::user()->email }}</div>
            </div>
         </div>
      </div>

      <ul class="sidebar-nav">
         <li class="sidebar-header">
            MENU
         </li>
         <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('dashboard.index') }}">
               <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Dashboard</span>
            </a>
         </li>

         @can('admin')
            <li class="sidebar-item  {{ Request::is('users') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('users.index') }}">
                  <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
               </a>
            </li>
         @endcan

         @can('kasir')
            <li class="sidebar-item  {{ Request::is('kasir') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('kasir.index') }}">
                  <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Cashier</span>
               </a>
            </li>
         @endcan

         @can('manajer')
            <li class="sidebar-item  {{ Request::is('products') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('products.index') }}">
                  <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Products</span>
               </a>
            </li>

            <li class="sidebar-item  {{ Request::is('categories') ? 'active' : '' }}"><a class="sidebar-link"
                  href="{{ route('categories.index') }}">
                  <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Category</span>
               </a>
            </li>

            <li class="sidebar-item  {{ Request::is('employees') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('employees.index') }}">
                  <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Employees</span>
               </a>
            </li>

            <li class="sidebar-item {{ Request::is('log*') ? 'active' : '' }}">
               <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                  <i class="align-middle" data-feather="git-merge"></i> <span class="align-middle">Log Activity</span>
               </a>
               <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('log.categories') }}">Category Log</a></li>
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('log.products') }}">Product Log <span
                           class="sidebar-badge badge bg-danger">2+</span></a></li>
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('log.users') }}">User Log <span
                           class="sidebar-badge badge bg-danger">3+</span></a></li>
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('log.categories') }}">Transaction Log</a></li>
               </ul>
            </li>
         @endcan

         @can('pelanggan')
            <li class="sidebar-item  {{ Request::is('pelanggan') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('pelanggan.index') }}">
                  <i class="align-middle" data-feather="meh"></i> <span class="align-middle">Pelanggan</span>
               </a>
            </li>
         @endcan

         {{-- <li class="sidebar-item">
            <a class="sidebar-link" href="pages-tasks.html">
               <i class="align-middle" data-feather="list"></i> <span class="align-middle">Request</span>
               <span class="sidebar-badge badge bg-danger">12+</span>
            </a>
         </li> --}}
      </ul>

      {{-- <div class="sidebar-cta">
         <div class="sidebar-cta-content">
            <strong class="d-inline-block mb-2">Weekly Sales Report</strong>
            <div class="mb-3 text-sm">
               Your weekly sales report is ready for download!
            </div>

            <div class="d-grid">
               <a href="https://adminkit.io/" class="btn btn-outline-primary" target="_blank">Download</a>
            </div>
         </div>
      </div> --}}
   </div>
</nav>

@include('layouts.modal.logout')
