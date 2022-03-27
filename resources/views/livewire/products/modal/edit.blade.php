<!-- Modal - Edit -->
<div wire:ignore.self class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editProductModalLabel">Edit Data Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='clear(); resetViewData();'></button>

         </div>
         <div class="modal-body">

            <form wire:submit.prevent='editProductData' autocomplete="off">
               <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" name="name" wire:model.lazy='name' id="name"
                     class="form-control
                @if ($errors->has('name')) is-invalid
                @elseif($name != null && $name != $view_product_name) '' @else 
                is-valid @endif
                "
                     placeholder="Nama Lengkap">
                  @error('name')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0"><small>{{ $message }}</small></span>
                  @enderror

               </div>
               <div class="mb-3">
                  <div class="mb-3">
                     <label for="category_id" class="form-label">Kategori</label>
                     <select class="form-control" name="category_id" id="category_id" wire:model='category_id'>
                        @foreach ($categories as $category)
                           @if ($view_product_category_name == $category->name)
                              <option value="{{ $category->id }}" selected>
                                 {{-- {{ $category->id . ' - ' . $category->name . ' (Selected)' }} --}}
                                 {{ $category->name . ' ✓' }}
                              </option>
                           @else
                              <option value="{{ $category->id }}"> {{ $category->name }}</option>
                           @endif
                        @endforeach
                     </select>
                     {{-- <input type="text" name="x" id="x" value="{{ $view_user_role_name . ' | ' . $view_user_role_id }}"> --}}
                  </div>
               </div>
               <div class="mb-3">
                  <label for="stock" class="form-label">Stock</label>
                  <input type="number" name="stock" wire:model.lazy='stock' id="stock" maxlength="4"
                     class="form-control
                @if ($errors->has('stock')) is-invalid
                @elseif($stock == null) '' @else 
                is-valid @endif
                ">
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
