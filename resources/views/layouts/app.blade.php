<!doctype html>
<html lang="en">

<head>

   <meta charset="utf-8" />
   <title>{{ $title ?? 'Pages' }} | {{ config('app.name') }}</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> --}}
   {{-- <meta content="Themesbrand" name="author" /> --}}
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.ico">

   <!-- Bootstrap Css -->
   <link href="{{ asset('') }}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="{{ asset('') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ asset('') }}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
   <!-- Custom Css -->
   <link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
   <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert/sweetalert2.min.css') }}">

   {{-- Select2 --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />


   @toastr_css
   <style>
      body #toast-container>div {
         opacity: 1;
      }

   </style>
   @stack('styles')
</head>

<body data-sidebar="dark">

   <!-- <body data-layout="horizontal" data-topbar="dark"> -->

   <!-- Begin page -->
   <div id="layout-wrapper">


      @include('layouts.header')

      <!-- ========== Left Sidebar Start ========== -->
      @include('layouts.sidebar')
      <!-- Left Sidebar End -->



      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">

         <div class="page-content">
            <div class="container-fluid">
               @yield('content')
            </div>
            <!-- container-fluid -->
         </div>
         <!-- End Page-content -->

         <!-- Transaction Modal -->
         {{-- <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
            aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                     <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                     <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                           <thead>
                              <tr>
                                 <th scope="col">Product</th>
                                 <th scope="col">Product Name</th>
                                 <th scope="col">Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <th scope="row">
                                    <div>
                                       <img src="{{ asset('') }}assets/images/product/img-7.png" alt="" class="avatar-sm">
                                    </div>
                                 </th>
                                 <td>
                                    <div>
                                       <h5 class="text-truncate font-size-14">Wireless Headphone (Black)
                                       </h5>
                                       <p class="text-muted mb-0">$ 225 x 1</p>
                                    </div>
                                 </td>
                                 <td>$ 255</td>
                              </tr>
                              <tr>
                                 <th scope="row">
                                    <div>
                                       <img src="{{ asset('') }}assets/images/product/img-4.png" alt="" class="avatar-sm">
                                    </div>
                                 </th>
                                 <td>
                                    <div>
                                       <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                       <p class="text-muted mb-0">$ 145 x 1</p>
                                    </div>
                                 </td>
                                 <td>$ 145</td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                 </td>
                                 <td>
                                    $ 400
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <h6 class="m-0 text-right">Shipping:</h6>
                                 </td>
                                 <td>
                                    Free
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2">
                                    <h6 class="m-0 text-right">Total:</h6>
                                 </td>
                                 <td>
                                    $ 400
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div> --}}
         <!-- end modal -->

         <!-- subscribeModal -->
         {{-- <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="text-center mb-4">
                        <div class="avatar-md mx-auto mb-4">
                           <div class="avatar-title bg-light rounded-circle text-primary h1">
                              <i class="mdi mdi-email-open"></i>
                           </div>
                        </div>

                        <div class="row justify-content-center">
                           <div class="col-xl-10">
                              <h4 class="text-primary">Subscribe !</h4>
                              <p class="text-muted font-size-14 mb-4">Subscribe our newletter and get
                                 notification to stay update.</p>

                              <div class="input-group bg-light rounded">
                                 <input type="email" class="form-control bg-transparent border-0"
                                    placeholder="Enter Email address" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">

                                 <button class="btn btn-primary" type="button" id="button-addon2">
                                    <i class="bx bxs-paper-plane"></i>
                                 </button>

                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}
         <!-- end modal -->

         @include('layouts.footer')
      </div>
      <!-- end main content-->

   </div>
   <!-- END layout-wrapper -->

   <!-- Right Sidebar -->
   <div class="right-bar">
      <div data-simplebar class="h-100">
         <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
               <i class="mdi mdi-close noti-icon"></i>
            </a>
         </div>

         <!-- Settings -->
         <hr class="mt-0" />
         <h6 class="text-center mb-0">Choose Layouts</h6>

         <div class="p-4">
            <div class="mb-2">
               <img src="{{ asset('') }}assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
            </div>

            <div class="form-check form-switch mb-3">
               <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
               <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
               <img src="{{ asset('') }}assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
               <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
               <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
               <img src="{{ asset('') }}assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
               <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
               <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <div class="mb-2">
               <img src="{{ asset('') }}assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-5">
               <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
               <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
            </div>


         </div>

      </div> <!-- end slimscroll-menu-->
   </div>
   <!-- /Right-bar -->

   <!-- Right bar overlay-->
   <div class="rightbar-overlay"></div>

   <!-- JAVASCRIPT -->
   <script src="{{ asset('') }}assets/libs/jquery.min.js"></script>
   <script src="{{ asset('') }}assets/libs/bootstrap.bundle.min.js"></script>
   <script src="{{ asset('') }}assets/libs/metisMenu.min.js"></script>
   <script src="{{ asset('') }}assets/libs/simplebar.min.js"></script>
   <script src="{{ asset('') }}assets/libs/waves.min.js"></script>

   <!-- apexcharts -->
   <script src="{{ asset('') }}assets/libs/apexcharts.min.js"></script>


   <!-- App js -->
   <script src="{{ asset('') }}assets/js/app.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script src="{{ asset('assets/libs/sweetalert/sweetalert2.min.js') }}"></script>
   {{-- <script src="{{ asset('assets/libs/sweetalert/sweet-alerts.init.js') }}"></script> --}}
   @stack('scripts')

   <script>
      // Toastr Notification 
      window.addEventListener('toastr:success', event => {
         toastr.info(event.detail.message);
      });
      window.addEventListener('toastr:info', event => {
         toastr.info(event.detail.message);
      });
      window.addEventListener('toastr:danger', event => {
         toastr.info(event.detail.message);
      });
      window.addEventListener('toastr:info', event => {
         toastr.info(event.detail.message);
      });

      // Sweet Alert
      window.addEventListener('swal:modal', event => {
         Swal.fire({
            'title': event.detail.title,
            'text': event.detail.text,
            'icon': event.detail.icon,
            timer: 2000,
            timerProgressBar: true,
         });
      });

      window.addEventListener('swal:confirm', event => {
         Swal.fire({
            'title': event.detail.title,
            'text': event.detail.text,
            'icon': event.detail.icon,
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: 'Yes, delete it!'

         }).then((result) => {
            if (result.isConfirmed) {
               livewire.emit('deleteUserData', event.detail.id);
               Swal.fire(
                  'Deleted!',
                  'The records has been deleted.',
                  'success'
               )
            }
         })
      });
   </script>
   {{-- @jquery --}}
   @toastr_js
   @toastr_render
</body>

</html>
