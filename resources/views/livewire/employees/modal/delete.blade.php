<!-- Modal - Delete -->
<div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deleteUserModalLabel">Delete Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">

            <h6>Are you sure? About to delete this data? </h6>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" wire:model="cancel()" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger" wire:click="deleteUserData()">Yes! Delete</button>
         </div>
         </form>



      </div>
   </div>
</div>
