@push('styles')
   @livewireStyles()
@endpush
@push('scripts')
   @livewireScripts()
@endpush

<div class="content-user">

   @include('livewire.employees.modal.edit')
   @include('livewire.employees.modal.delete')
   @include('livewire.employees.modal.create')
   @include('livewire.employees.modal.detail')

   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Kasir Manajemen</h4>



            <div class="page-title-right">
               {{-- <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol> --}}
               <a href="{{ route('employees.pdf') }}" class="btn btn-dark border-0 bg-danger me-2">
                  <i class="fas fa-print me-2"></i>
                  Export PDF
               </a>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah Kasir</button>
            </div>

         </div>
      </div>
   </div>


   <div class="row">
      <div class="col-lg-12">
         <div class="card mb-4">
            <div class="card-body">
               <div class="row mb-4 d-flex justify-content-between">
                  <div class="col-lg-6 col-md-10 col-sm-12">
                     <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                           <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y">
                           </span>
                           <span class="position-absolute top-50 search-close translate-middle-y">
                           </span>
                        </div>
                     </div>
                  </div>
                  {{-- <div class="col-lg-2">
                     <select class="form-control" name="select2" id="select-filter">
                        @foreach ($selectfilters as $item)
                           <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                     </select>
                  </div> --}}
                  <div class="col-lg-4 d-flex justify-content-end align-items-start">
                     <button class="bg-transparent btn-md border-0 btn" data-bs-toggle="modal" width="20px" data-bs-target="#addUserModal"> <i class="fas fa-plus fa-lg text-primary"></i></button>

                  </div>
               </div>

               @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     {!! session('message') !!}
                  </div>
               @endif

               <div class="table-responsive">
                  <table class="table align-middle table-nowrap table-check">
                     <thead class="table-light">
                        <tr class="text-start text-uppercase" style="font-family: poppins">
                           <th scope="col">#</th>
                           <th scope="col">Photo</th>
                           <th scope="col">Name</th>
                           <th scope="col">Username</th>
                           <th scope="col">Email</th>
                           <th scope="col">Role</th>
                           <th scope="col">Status</th>
                           <th scope="col" class="text-center">⚙⚙⚙</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($users as $user)
                           <tr>
                              <th scope="row" class="">{{ $loop->iteration }}</th>
                              <td style="width: 15%">
                                 <img src="{{ asset('assets/images/users/avatar-10.jpg') }}" class="img-thumbnail rounded" width="80%" alt="image">
                              </td>
                              <td>
                                 {{ $user->name }}
                              </td>
                              <td>
                                 {{ $user->username }}
                              </td>
                              <td>
                                 {{ $user->email }}
                              </td>
                              <td class="text-start">{{ $user->role->name }}</td>
                              <td class="text-start ms-1">
                                 <span class="badge rounded-pill badge-success-light">Active</span>
                              </td>
                              <td class="text-center" style="width: 15%">
                                 <button class="btn border-0 bg-transparent btn-sm" wire:click.prevent="detailUser({{ $user->id }})">
                                    {{-- <i class="align-middle text-primary" data-feather="info"></i> --}}
                                    <i class="align-middle text-primary fas fa-lg fa-mouse-pointer"></i>
                                 </button>
                                 <button class="btn border-0 bg-transparent btn-sm" wire:click="editUser({{ $user->id }})">
                                    {{-- <i class="align-middle text-success" data-feather="edit-2"></i> --}}
                                    <i class="align-middle text-success fas fa-lg fa-edit"></i>
                                 </button>
                                 <button class="btn border-0 bg-transparent btn-sm" wire:click="deleteConfirm({{ $user->id }})">
                                    {{-- <i class="align-middle text-danger" data-feather="trash"></i> --}}
                                    <i class="align-middle text-danger fas fa-lg fa-trash-alt"></i>
                                 </button>
                              </td>
                           </tr>
                        @empty
                           <tr>
                              <td colspan="6" class="text-center mt-4">
                                 <h4 class=" text-secondary">There is no employees have been stored.</h4>
                              </td>
                           </tr>
                        @endforelse
                     </tbody>
                  </table>
               </div>

            </div>
         </div>
      </div>




   </div>
</div>

@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#addUserModal').modal('hide');
         $('#editUserModal').modal('hide');
         $('#deleteUserModal').modal('hide');
         $('#detailUserModal').modal('hide');

      });

      window.addEventListener('show-edit-user-modal', event => {
         $('#editUserModal').modal('show');
      });

      window.addEventListener('show-delete-user-modal', event => {
         $('#deleteUserModal').modal('show');
      });

      window.addEventListener('show-detail-user-modal', event => {
         $('#detailUserModal').modal('show');
      });

      window.addEventListener('swal:confirm-employee', event => {
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
   <script>
      $(document).ready(function() {
         $('#select-filter').select2();
         $('#select-filter').on('change', function(e) {
            var data = $('#select-filter').select2("val");
            @this.set('tampungFilter', data);
         });
      });
   </script>
@endpush
