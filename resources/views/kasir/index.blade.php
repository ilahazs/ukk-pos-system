@extends('layouts.app')
@section('content')
   <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong>Kasir</strong> Data</h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
         <a href="#" class="btn btn-light bg-white me-2">Kasir Overview</a>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModalSuccess">Tambah Data</button>
      </div>
   </div>
@endsection
