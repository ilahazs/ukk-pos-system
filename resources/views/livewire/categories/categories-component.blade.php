@push('styles')
   @livewireStyles()
@endpush
@push('scripts')
   @livewireScripts()
@endpush

<div class="content-user">
   {{-- <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block" style="font-family: inter">
         <h3><strong>Menu Category</strong></h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
         <a href="{{ route('categories.pdf') }}" class="btn btn-dark border-0 bg-danger me-2">
            <i class="fas fa-print me-2"></i>
            Export PDF
         </a>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah Category</button>
      </div>
   </div> --}}

   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Kategori Produk</h4>



            <div class="page-title-right">
               {{-- <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol> --}}
               <a href="{{ route('categories.pdf') }}" class="btn btn-dark border-0 bg-danger me-2">
                  <i class="fas fa-print me-2"></i>
                  Export PDF
               </a>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah Kategori</button>
            </div>

         </div>
      </div>
   </div>

   {{-- <div class="row mb-3">
      <div class="col-auto ms-auto text-end mt-n1">
         <a href="{{ route('categories.pdf') }}" class="btn btn-dark border-0 bg-danger me-2">
            <i class="fas fa-print me-2"></i>
            Export PDF
         </a>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah Kategori</button>
      </div>
   </div> --}}
   <!-- end page title -->


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
                     <button class="btn btn-primary btn-md rounded btn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Tambah Kategori <i
                           class="fas fa-plus fa-lg"></i></button>
                     @include('livewire.categories.modal.create')


                  </div>
               </div>

               @if (session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     {!! session('message') !!}
                  </div>
               @endif

               <div class="row d-flex justify-content-center">
                  <div class="col-lg-12">
                     <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check" style="font-family: poppins">
                           <thead class="table-light">
                              <tr class="text-start text-uppercase">
                                 <th scope="col">#</th>
                                 <th scope="col">Nama</th>
                                 <th scope="col">Deskripsi</th>
                                 <th scope="col" class="text-center">⚙⚙⚙</th>
                              </tr>
                           </thead>
                           <tbody>
                              @forelse ($categories as $category)
                                 <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class="text-center">
                                       {{-- <button class="btn border-0 bg-transparent btn-sm" wire:click.prevent="detailCategory({{ $user->id }})">
                                          <i class="align-middle text-primary fas fa-lg fa-mouse-pointer"></i>
                                       </button> --}}
                                       <button class="btn border-0 bg-transparent btn-sm" wire:click="editCategory({{ $category->id }})">
                                          {{-- <i class="align-middle text-success" data-feather="edit-2"></i> --}}
                                          <i class="align-middle text-success fas fa-lg fa-edit"></i>
                                       </button>
                                       <button class="btn border-0 bg-transparent btn-sm" wire:click="deleteConfirm({{ $category->id }})">
                                          {{-- <i class="align-middle text-danger" data-feather="trash"></i> --}}
                                          <i class="align-middle text-danger fas fa-lg fa-trash-alt"></i>
                                       </button>

                                    </td>

                                 </tr>

                              @empty
                                 <tr>
                                    <td colspan="4" class="text-center mt-2">
                                       <h4>There is no category item stored.</h4>
                                    </td>
                                 </tr>
                              @endforelse
                           </tbody>
                        </table>
                        @include('livewire.categories.modal.delete')
                        @include('livewire.categories.modal.detail')
                        @include('livewire.categories.modal.edit')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>





   </div>
</div>

@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#addCategoryModal').modal('hide');
         $('#editCategoryModal').modal('hide');
         $('#deleteCategoryModal').modal('hide');
         $('#detailCategoryModal').modal('hide');

      });

      window.addEventListener('show-edit-category-modal', event => {
         $('#editCategoryModal').modal('show');
      });

      window.addEventListener('show-delete-category-modal', event => {
         $('#deleteCategoryModal').modal('show');
      });

      window.addEventListener('show-detail-category-modal', event => {
         $('#detailCategoryModal').modal('show');
      });

      window.addEventListener('swal:confirm-category', event => {
         Swal.fire({
            'title': event.detail.title,
            'text': event.detail.text,
            'icon': event.detail.icon,
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: 'Yes, delete it!'

         }).then((result) => {
            if (result.isConfirmed) {
               livewire.emit('deleteCategoryData', event.detail.id);
               Swal.fire(
                  'Deleted!',
                  'The records has been deleted.',
                  'success'
               )
            }
         })
      });
   </script>
@endpush
