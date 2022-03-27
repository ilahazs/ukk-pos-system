<!-- Modal - Detail -->
<div wire:ignore.self class="modal fade" id="detailProductModal" tabindex="-1" aria-labelledby="detailProductModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="detailProductModalLabel">Product Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeProductDetailModal'></button>
         </div>
         <div class="modal-body">
            <table class="table table-bordered">
               <tbody>
                  <tr>
                     <th>Name : </th>
                     <td>{{ $view_product_name }}</td>

                  </tr>
                  <tr>
                     <th>Category : </th>
                     <td>{{ $view_product_category_name }}</td>
                  </tr>
                  <tr>
                     <th>Stock : </th>
                     <td>{{ $view_product_stock }}</td>
                  </tr>
               </tbody>
            </table>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeProductDetailModal'>Close</button>
            <button class="btn btn-success" data-bs-dismiss="modal" wire:click="editProduct({{ $view_product_id }})">Edit</button>
         </div>



      </div>
   </div>
</div>
