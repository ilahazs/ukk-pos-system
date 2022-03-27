<div class="table-responsive">
   <table class="table table-md table-centered table-nowrap mb-0 rounded">
      <thead class="thead-light" style="border-bottom: 0 ">
         <tr class="text-start text-uppercase" style="font-family: inter">
            <th scope="col" class="border-0 rounded-start">#</th>
            <th scope="col" class="border-end-1 ms-2">Photo</th>
            <th scope="col" class="border-end-1">Name</th>
            <th scope="col" class="border-end-1">Username</th>
            <th scope="col" class="border-end-1">Email</th>
            <th scope="col" class="border-end-1">Role</th>
            <th scope="col" class="border-end-1">Status</th>
            <th scope="col" class="text-center border-0 rounded-end">⚙⚙⚙</th>
         </tr>
      </thead>
      <tbody style="border-top: 0 ">
         @forelse ($users as $user)
            <tr style="border-top: 0 ">
               <th scope="row" class="">{{ $loop->iteration }}</th>
               <td style="width: 15%">
                  <img src="{{ asset('img/category/drinks3.png') }}" class="img-thumbnail rounded" width="80%" alt="image">
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
                  <span class="badge rounded-pill bg-success">Active</span>
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
