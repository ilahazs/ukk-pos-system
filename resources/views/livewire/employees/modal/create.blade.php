<!-- Modal - Create -->
<div wire:ignore.self class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Tambah Kasir Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='clear'></button>
         </div>
         <div class="modal-body">

            <form wire:submit.prevent='storeUserData' autocomplete="off">
               <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" name="name" wire:model.lazy='name' id="name"
                     class="form-control
                @if ($errors->has('name')) is-invalid
                @elseif($name == null) '' @else 
                is-valid @endif
                "
                     placeholder="Nama Lengkap">
                  @error('name')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0">{{ $message }}</span>
                  @enderror

               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" wire:model.lazy='email' id="email"
                     class="form-control
                @if ($errors->has('email')) is-invalid
                @elseif($email == null) '' @else 
                is-valid @endif
                "
                     placeholder="example@gmail.com">
                  @error('email')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0">{{ $message }}</span>
                  @enderror
               </div>
               {{-- <button type="submit" class="btn btn-dark my-2 float-right">Submit</button> --}}

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='clear'>Close</button>
            <button type="submit" class="btn btn-dark">Submit</button>
         </div>
         </form>



      </div>
   </div>
</div>
