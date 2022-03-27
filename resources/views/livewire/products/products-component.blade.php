@push('styles')
   @livewireStyles()
@endpush
@push('scripts')
   @livewireScripts()
@endpush

<div class="content-user">
   @include('livewire.products.modal.edit')
   @include('livewire.products.modal.delete')
   @include('livewire.products.modal.create')
   @include('livewire.products.modal.detail')

   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Produk Item</h4>



            <div class="page-title-right">
               {{-- <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol> --}}
               <a href="{{ route('products.pdf') }}" class="btn btn-dark border-0 bg-danger me-2">
                  <i class="fas fa-print me-2"></i>
                  Export PDF
               </a>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Tambah Produk</button>
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
                     <button class="bg-transparent btn-md border-0 btn" data-bs-toggle="modal" data-bs-target="#addProductModal"> <i class="fas fa-plus fa-lg text-primary"
                           style="font-size: 14px"></i></button>

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
                           <th scope="col">Product</th>
                           <th scope="col">Category</th>
                           <th scope="col">Stock</th>
                           <th scope="col" class="text-center">⚙⚙⚙</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($products as $product)
                           <tr style="border-top: 0 ">
                              <th scope="row" class="">{{ $loop->iteration }}</th>
                              <td style="width: 15%">
                                 @if ($product->category->name == 'Minuman')
                                    <img src="{{ asset('img/category/drinks3.png') }}" class="img-thumbnail rounded" width="80%" alt="image">
                                 @elseif ($product->category->name == 'Makanan')
                                    <img src="{{ asset('img/category/food.jpg') }}" class="img-thumbnail rounded" width="80%" alt="image">
                                 @elseif ($product->category->name == 'Kopi' || $product->category->name == 'Coffe')
                                    <img src="{{ asset('img/category/coffe.jpg') }}" class="img-thumbnail rounded" width="80%" alt="image">
                                 @elseif ($product->category->name == 'Obat')
                                    <img src="{{ asset('img/category/medicine.jpg') }}" class="img-thumbnail rounded" width="80%" alt="image">
                                 @else
                                    <img src="{{ asset('assets/images/food/food pngwing.com (4).png') }}" class="img-thumbnail rounded" width="80%" alt="image">
                                 @endif
                              </td>
                              <td>
                                 {{ $product->name }}
                              </td>
                              {{-- <td>
                                 <div class="d-flex justify-content-start align-items-center">
                                    @if ($product->category->name == 'Minuman')
                                       <img src="{{ asset('img/category/drinks3.png') }}" class="img-thumbnail rounded me-2" width="8%" alt="image">
                                    @elseif ($product->category->name == 'Makanan')
                                       <img src="{{ asset('img/category/food.jpg') }}" class="img-thumbnail rounded me-2" width="10%" alt="image">
                                    @elseif ($product->category->name == 'Kopi')
                                       <img src="{{ asset('img/category/coffe.jpg') }}" class="img-thumbnail rounded me-2" width="12%" alt="image">
                                    @elseif ($product->category->name == 'Obat')
                                       <img src="{{ asset('img/category/medicine.jpg') }}" class="img-thumbnail rounded me-2" width="10%" alt="image">
                                    @endif
                                    <div class="vr me-3"></div>
                                    {{ $product->name }}
                                 </div>
                              </td> --}}
                              <td class="text-start">{{ $product->category->name }}</td>
                              <td class="text-start ms-1">{{ $product->stock }}</td>
                              <td class="text-center" style="width: 15%">
                                 <button class="btn border-0 bg-transparent btn-sm" wire:click.prevent="detailProduct({{ $product->id }})">
                                    {{-- <i class="align-middle text-primary" data-feather="info"></i> --}}
                                    <i class="align-middle text-primary fas fa-lg fa-mouse-pointer"></i>
                                 </button>
                                 <button class="btn border-0 bg-transparent btn-sm" wire:click="editProduct({{ $product->id }})">
                                    {{-- <i class="align-middle text-success" data-feather="edit-2"></i> --}}
                                    <i class="align-middle text-success fas fa-lg fa-edit"></i>
                                 </button>
                                 <button class="btn border-0 bg-transparent btn-sm" wire:click="deleteConfirm({{ $product->id }})">
                                    {{-- <i class="align-middle text-danger" data-feather="trash"></i> --}}
                                    <i class="align-middle text-danger fas fa-lg fa-trash-alt"></i>
                                 </button>
                              </td>
                              {{-- <td class="text-center">
                                 <button class="badge bg-primary rounded border-0" wire:click.prevent="detailProduct({{ $product->id }})"><i class='bx bx-show' style="font-size: 1rem"></i></button>
                                 <button class="badge bg-success rounded border-0" wire:click="editProduct({{ $product->id }})"><i class='bx bx-edit' style="font-size: 1rem"></i></button>
                                 <button class="badge bg-danger rounded border-0" wire:click="deleteConfirm({{ $product->id }})"><i class='bx bx-trash' style="font-size: 1rem"></i></button>
                              </td> --}}
                           </tr>
                        @empty
                           <tr>
                              <td colspan="6" class="text-center mt-4">
                                 <h4 class=" text-secondary">There is no products have been stored.</h4>
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
         $('#addProductModal').modal('hide');
         $('#editProductModal').modal('hide');
         $('#deleteProductModal').modal('hide');
         $('#detailProductModal').modal('hide');

      });

      window.addEventListener('show-edit-product-modal', event => {
         $('#editProductModal').modal('show');
      });

      window.addEventListener('show-delete-product-modal', event => {
         $('#deleteProductModal').modal('show');
      });

      window.addEventListener('show-detail-product-modal', event => {
         $('#detailProductModal').modal('show');
      });

      window.addEventListener('swal:confirm-product', event => {
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
               livewire.emit('deleteProductData', event.detail.id);
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
