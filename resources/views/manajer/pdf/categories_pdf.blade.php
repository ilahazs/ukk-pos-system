<!doctype html>
<html lang="en">

<head>
   <title>Categories Product Overview</title>
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

   </style>


</head>

<body>

   <div class="container my-5">
      <h3 class="mb-2">Categories Product</h3>
      <hr class="mb-4">
      <table class="table table-bordered table-inverse">
         <thead class="thead-default">
            <tr>
               <th>No.</th>
               <th>Kategori</th>
               <th>Deskripsi</th>
            </tr>
         </thead>
         <tbody>
            @forelse($categories as $key => $value)
               <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{ $value->name }}</td>
                  <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</td>
               </tr>
            @empty
               <tr>
                  <td colspan="3" class="text-center mt-2">
                     <h4>There is no category item stored.</h4>
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
