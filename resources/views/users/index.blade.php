@extends('layouts.app')
@section('content')
   <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong>Users</strong> Manajemen</h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
         <a href="#" class="btn btn-light bg-white me-2">Users Overview</a>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalSuccess">Tambah User</button>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive table-striped">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>NO</th>
                           <th>Name</th>
                           <th>EMAIL</th>
                           <th>⚙⚙⚙</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                           <tr>
                              <td scope="row">{{ $loop->iteration }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td class="table-action">
                                 <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                                 <a href="#"><i class="align-middle" data-feather="trash"></i></a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>

               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="defaultModalSuccess" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Default modal</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
               <p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
                  notifications, or completely custom content.</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-success">Save changes</button>
            </div>
         </div>
      </div>
   </div>
   <!-- END success modal -->
@endsection
