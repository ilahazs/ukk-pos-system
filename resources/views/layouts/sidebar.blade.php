<div class="vertical-menu">

   <div data-simplebar class="h-100">

      <!--- Sidemenu -->
      <div id="sidebar-menu">
         <!-- Left Menu Start -->
         <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>

            {{-- <li>
               <a href="javascript: void(0);" class="waves-effect">
                  <i class="bx bx-home-circle"></i><span
                     class="badge rounded-pill bg-info float-end">04</span>
                  <span key="t-dashboards">Dashboards</span>
               </a>
               <ul class="sub-menu" aria-expanded="false">
                  <li><a href="index.html" key="t-default">Default</a></li>
                  <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                  <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                  <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
               </ul>
            </li> --}}

            <li class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
               <a href="{{ route('dashboard.index') }}" class="waves-effect">
                  <i class="bx bx-home-circle"></i>
                  <span key="t-chat">Dashboard</span>
               </a>
            </li>
            <li class="{{ Request::is('categories') ? 'mm-active' : '' }}">
               <a href="{{ route('categories.index') }}" class="waves-effect">
                  <i class="bx bx-purchase-tag-alt"></i>
                  <span key="t-chat">Kategori</span>
               </a>
            </li>
            <li class="{{ Request::is('products') ? 'mm-active' : '' }}">
               <a href="{{ route('products.index') }}" class="waves-effect">
                  <i class="bx bx-list-ul"></i>
                  <span key="t-chat">Produk</span>
               </a>
            </li>
            <li class="{{ Request::is('transactions') ? 'mm-active' : '' }}">
               <a href="{{ route('products.index') }}" class="waves-effect">
                  <i class="bx bx-store"></i>
                  <span key="t-chat">Transaksi</span>
               </a>
            </li>
            <li class="{{ Request::is('employees') ? 'mm-active' : '' }}">
               <a href="{{ route('employees.index') }}" class="waves-effect">
                  <i class="bx bx-user"></i>
                  <span key="t-chat">Kasir</span>
               </a>
            </li>

            <li>
               <a href="javascript: void(0);" class="has-arrow waves-effect">
                  <i class="bx bx-task"></i>
                  <span key="t-tasks">Log Activity</span>
               </a>
               <ul class="sub-menu" aria-expanded="false">
                  <li>
                     <a href="tasks-list.html" key="t-task-list">
                        All
                        {{-- <i class="bx bx-list-ul"></i> --}}
                     </a>
                  </li>
                  <li class="{{ Request::is('log_products') ? 'mm-active' : '' }}">
                     <a href="{{ route('log.products') }}" key="t-task-list">
                        Produk
                        {{-- <i class="bx bx-list-ul"></i> --}}
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('log.categories') }}" key="t-kanban-board">
                        Kategori
                        {{-- <i class="bx bx-purchase-tag-alt"></i> --}}
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('log.users') }}" key="t-create-task">
                        Kasir
                        {{-- <i class="bx bx-user"></i> --}}
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('log.products') }}l" key="t-create-task">
                        Transaksi
                        {{-- <i class="bx bx-store"></i> --}}
                     </a>
                  </li>
               </ul>
            </li>



         </ul>
      </div>
      <!-- Sidebar -->
   </div>
</div>
