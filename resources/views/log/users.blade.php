@extends('layouts.app')
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Kasir Akun Log Histori</h4>

            <div class="page-title-right">
               <a target="_blank" href="{{ route('log.users-pdf') }}" class="btn btn-dark border-0 bg-danger me-2">
                  <i class="fas fa-print me-2"></i>
                  Export PDF</a>
            </div>

         </div>
      </div>
   </div>


   <div class="card">
      <div class="card-body">
         <table class="table align-middle table-nowrap table-check">
            <thead class="table-light">
               <tr class="text-uppercase" style="font-family: poppins">
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Activity</th>
                  <th>Target</th>
                  <th>Time</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($users as $item)
                  <tr class="border-1">
                     <td scope="row">{{ $loop->iteration }}</td>
                     <td>{{ $item->user->name }}</td>
                     <td>{{ $item->user->email }}</td>
                     <td>{{ $item->user->role->name }}</td>
                     <td>{{ $item->activity }}</td>
                     <td>{{ $item->target->name }}</td>
                     <td>{{ $item->time }}</td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="7" class="text-center mt-2">
                        <h4>There is no log activity data have recorded.</h4>
                     </td>
                  </tr>
               @endforelse

            </tbody>
         </table>

      </div>
   </div>
@endsection
