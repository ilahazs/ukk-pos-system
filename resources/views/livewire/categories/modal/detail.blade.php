<!-- Modal - Detail -->
<div wire:ignore.self class="modal fade" id="detailCategoryModal" tabindex="-1" aria-labelledby="detailCategoryModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="detailCategoryModalLabel">Category Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeCategoryDetailModal'></button>
         </div>
         <div class="modal-body">
            <table class="table table-bordered">
               <tbody>
                  <tr>
                     <th>Name : </th>
                     <td>{{ $view_category_name }}</td>
                  </tr>
               </tbody>
            </table>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeCategoryDetailModal'>Close</button>
            <button class="btn btn-success" data-bs-dismiss="modal" wire:click="editCategory({{ $view_category_id }})">Edit</button>
         </div>



      </div>
   </div>
</div>
