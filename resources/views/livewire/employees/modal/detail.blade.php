<!-- Modal - Detail -->
<div wire:ignore.self class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="detailUserModalLabel">User Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='closeUserDetailModal'></button>
         </div>
         <div class="modal-body">
            <table class="table table-bordered">
               <tbody>
                  <tr>
                     <th>Name : </th>
                     <td>{{ $view_user_name }}</td>

                  </tr>
                  <tr>
                     <th>Username : </th>
                     <td>{{ $view_user_username }}</td>

                  </tr>
                  <tr>
                     <th>Role : </th>
                     <td>{{ $view_user_role_name }}</td>
                  </tr>
                  <tr>
                     <th>Email : </th>
                     <td>{{ $view_user_email }}</td>
                  </tr>
               </tbody>
            </table>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='closeUserDetailModal'>Close</button>
            <button class="btn btn-success" data-bs-dismiss="modal" wire:click="editUser({{ $view_user_id }})">Edit</button>
         </div>



      </div>
   </div>
</div>
