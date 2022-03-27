<!doctype html>
<html lang="en">

<head>
   <title>Products Overview</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS 4.4.1 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
   <style>
      @page {
         margin: 0px;
      }

      body {
         margin: 0px;
         font-family: "Times New Roman";
      }

      /*
      .container {
         padding: 2rem 0rem;
      } */

      h4 {
         margin: 2rem 0rem 1rem;
      }

      .table-image {

         td,
         th {
            vertical-align: middle;
         }
      }

   </style>


</head>

<body>

   <div class="container my-5">
      <h3 class="mb-2">List of Products</h3>
      <hr class="mb-4">
      <table class="table table-bordered table-inverse table-image">
         <thead class="thead-default">
            <tr>
               <th>No.</th>
               <th>Foto</th>
               <th>Nama</th>
               <th>Kategori</th>
               <th>Stock</th>
            </tr>
         </thead>
         <tbody>
            @forelse($products as $key => $value)
               <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td style="width: 15%" class="text-center">
                     @if ($value->category->name == 'Minuman')
                        <img src="{{ asset('img/category/drinks3.png') }}" class="img-thumbnail rounded me-2" width="70%" alt="image">
                     @elseif ($value->category->name == 'Makanan')
                        <img src="{{ asset('img/category/food.jpg') }}" class="img-thumbnail rounded me-2" width="70%" alt="image">
                     @elseif ($value->category->name == 'Kopi')
                        <img src="{{ asset('img/category/coffe.jpg') }}" class="img-thumbnail rounded me-2" width="70%" alt="image">
                     @elseif ($value->category->name == 'Obat')
                        <img src="{{ asset('img/category/medicine.jpg') }}" class="img-thumbnail rounded me-2" width="70%" alt="image">
                     @endif
                  </td>
                  <td>
                     {{ $value->name }}
                  </td>
                  <td>{{ $value->category->name }}</td>
                  <td>{{ $value->stock }}</td>
               </tr>
            @empty
               <tr>
                  <td colspan="4" class="text-center mt-2">
                     <h4>There is no products item have stored.</h4>
                  </td>
               </tr>
            @endforelse
         </tbody>
      </table>
   </div>

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
   </script>

</body>

</html>
