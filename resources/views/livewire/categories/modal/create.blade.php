<!-- Modal - Create -->
<div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='clear'></button>
         </div>
         <div class="modal-body">

            <form wire:submit.prevent='storeCategoryData' autocomplete="off">
               <div class="mb-3">
                  <label for="name" class="form-label">Nama <sup class="text-danger"> *</sup></label>
                  <input type="text" name="name" wire:model.lazy='name' id="name"
                     class="form-control
                @if ($errors->has('name')) is-invalid
                @elseif($name == null) '' @else 
                is-valid @endif
                "
                     placeholder="Jenis Kategori">
                  @error('name')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0">{{ $message }}</span>
                  @enderror

               </div>
               <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea class="form-control 
                 @if ($errors->has('description')) is-invalid
                 @elseif($description == null) '' @else 
                 is-valid @endif
                 "
                     wire:model.lazy='description' name="description" id="description" rows="3" placeholder="Deskripsi Kategori ..."></textarea>
                  @error('description')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0">{{ $message }}</span>
                  @enderror
               </div>
               {{-- <button type="submit" class="btn btn-dark my-2 float-right">Submit</button> --}}

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal" wire:click='clear'>Close</button>
            <button type="submit" class="btn btn-dark waves-effect">Submit</button>
         </div>
         </form>



      </div>
   </div>
</div>
