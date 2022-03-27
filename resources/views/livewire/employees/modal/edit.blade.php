<!-- Modal - Edit -->
<div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Edit Data Kasir</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='clear(); resetViewData();'></button>

         </div>
         <div class="modal-body">

            <form wire:submit.prevent='editUserData' autocomplete="off">
               <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" wire:model.lazy='name' id="name"
                     class="form-control
                @if ($errors->has('name')) is-invalid
                @elseif($name == null) '' @else 
                is-valid @endif
                "
                     placeholder="Nama Lengkap">
                  @error('name')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0"><small>{{ $message }}</small></span>
                  @enderror

               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" wire:model.lazy='email' id="email"
                     class="form-control
                @if ($errors->has('email')) is-invalid
                @elseif($email == null) '' @else 
                is-valid @endif
                "
                     placeholder="1920118XXX">
                  @error('email')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0"><small>{{ $message }}</small></span>
                  @enderror
               </div>
               {{-- <button type="submit" class="btn btn-dark my-2 float-right">Submit</button> --}}

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:click="resetInputFieldsEdit(); clear();" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Update</button>
         </div>
         </form>



      </div>
   </div>
</div>
