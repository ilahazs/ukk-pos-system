@push('styles')
   @livewireStyles()
@endpush
@push('scripts')
   @livewireScripts()
@endpush

<div class="content-user">
   <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong>Users</strong> Manajemen</h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
         <a href="#" class="btn btn-light bg-white me-2">
            <i class="fas fa-print me-2"></i>
            Users Overview</a>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah User</button>
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
                  <div class="col-lg-4 d-flex justify-content-end align-items-start">
                     <button class="bg-transparent btn-md border-0 btn" data-bs-toggle="modal" data-bs-target="#addUserModal"> <i class="fas fa-plus fa-lg text-primary"></i></button>

                  </div>
               </div>

               @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     {!! session('message') !!}
                  </div>
               @endif

               <div class="table-responsive">
                  <table class="table table-md table-striped table-hover">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Username</th>
                           <th scope="col">Email</th>
                           <th scope="col">Role</th>
                           <th scope="col" class="text-center">⚙⚙⚙</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($users as $user)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ optional($user->role)->name }}</td>
                              <td class="text-center">
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
                              {{-- <td class="text-center">
                                 <button class="badge bg-primary rounded border-0" wire:click.prevent="detailUser({{ $user->id }})"><i class='bx bx-show' style="font-size: 1rem"></i></button>
                                 <button class="badge bg-success rounded border-0" wire:click="editUser({{ $user->id }})"><i class='bx bx-edit' style="font-size: 1rem"></i></button>
                                 <button class="badge bg-danger rounded border-0" wire:click="deleteConfirm({{ $user->id }})"><i class='bx bx-trash' style="font-size: 1rem"></i></button>
                              </td> --}}
                           </tr>
                        @empty
                           <tr>
                              <td colspan="3" class="text-center">
                                 <h3>There is no user stored.</h3>
                              </td>
                           </tr>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>


      @include('livewire.users.modal.edit')
      @include('livewire.users.modal.delete')
      @include('livewire.users.modal.create')
      @include('livewire.users.modal.detail')


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
   </script>
@endpush
