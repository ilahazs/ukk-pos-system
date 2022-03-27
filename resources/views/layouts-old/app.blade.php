<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
   <meta name="author" content="AdminKit">
   <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />

   <link rel="canonical" href="https://demo.adminkit.io/" />

   <title>{{ ($title != null ? $title : 'Pages') . ' | ' . config('app.name') }}</title>

   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

   <!-- Choose your prefered color scheme -->
   <!-- <link href="css/light.css" rel="stylesheet"> -->
   <!-- <link href="css/dark.css" rel="stylesheet"> -->

   <!-- BEGIN SETTINGS -->
   <!-- Remove this after purchasing -->
   <link class="js-stylesheet" href="{{ asset('css/light.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <script src="{{ asset('js/settings.js') }}"></script>
   <style>
      body {
         /* opacity: 0; */
         /* font-family: "SF PRO TEXT"; */
      }

   </style>
   <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
   <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
   {{-- Select2 --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />


   @toastr_css
   <style>
      body #toast-container>div {
         opacity: 1;
      }

   </style>
   @stack('styles')
</head>

<!--
  HOW TO USE:
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
   <div class="wrapper">
      @include('layouts.sidebar')

      <div class="main">
         @include('layouts.header')


         <main class="content">
            <div class="container-fluid p-0">
               @yield('content')
            </div>
         </main>

         @include('layouts.footer')

      </div>
   </div>

   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('plugins/jquery/jquery-3.6.0.min.js') }}"></script>

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
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
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
