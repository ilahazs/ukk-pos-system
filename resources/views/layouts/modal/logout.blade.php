<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            {{-- Select "Logout" below if you are ready to end your current session. --}}
            Klik tombol "Logout" dibawah untuk mengakhiri sesi anda.
         </div>
         <div class="modal-footer">
            <button class="btn btn-secondary waves-effect" type="button" data-bs-dismiss="modal">Cancel</button>
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="btn btn-danger waves-effect">
                  Logout
               </button>
            </form>
         </div>
      </div>
   </div>
</div>
