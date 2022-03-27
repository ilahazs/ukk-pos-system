<!-- Modal - Create -->
<div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='clear'></button>
         </div>
         <div class="modal-body">

            <form wire:submit.prevent='storeProductData' autocomplete="off">
               <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" wire:model.lazy='name' id="name"
                     class="form-control
                @if ($errors->has('name')) is-invalid
                @elseif($name == null) '' @else 
                is-valid @endif
                "
                     placeholder="Nama Produk">
                  @error('name')
                     <span class="error text-danger p-1 text-sm mt-1 mb-0">{{ $message }}</span>
                  @enderror

               </div>
               <div class="mb-3">
                  <div class="mb-3">
                     <label for="role_id" class="form-label">Kategori</label>
                     <select
                        class="form-control @if ($errors->has('category_id')) is-invalid
                        @elseif($category_id == null) '' @else 
                        is-valid @endif"
                        name="category_id" id="category_id" wire:model='category_id' required>
                        <option value="" disabled>—Please select—</option>
                        @foreach ($categories as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           {{-- @if ($value->id === 4)
                              <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                           @else
                           @endif --}}
                        @endforeach
                     </select>
                     @error('category_id')
                        <span class="error text-danger p-1 text-sm mt-1 mb-0">{{ $message }}</span>
                     @enderror
                     {{-- <input type="hidden" name="category_id" wire:model='category_id' value="1"> --}}
                  </div>
               </div>
               <div class="mb-3">
                  <label for="stock" class="form-label">Stock</label>
                  {{-- <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" name="stock" wire:model='stock' id="stock"
                         class="form-control
                @if ($errors->has('stock')) is-invalid
                @elseif($stock == null) '' @else 
                is-valid @endif
                "> --}}
                  <input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" name="stock" wire:model='stock' id="stock" maxlength="4"
                     class="form-control
                @if ($errors->has('stock')) is-invalid
                @elseif($stock == null) '' @else 
                is-valid @endif
                ">
                  @error('stock')
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

@push('scripts')
   <script>
      $(document).ready(function() {
         $('#category_id').select2();
         // $('#category_id').on('change', function(e) {
         //    var data = $('#category_id').select2("val");
         //    @this.set('category_id', data);
         // });
      });
   </script>
@endpush
