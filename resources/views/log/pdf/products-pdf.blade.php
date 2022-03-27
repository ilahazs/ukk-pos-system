<!doctype html>
<html lang="en">

<head>
   <title>Products Log Activity</title>
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
         font-family: "Roboto";
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
      <h3 class="mb-2">Log Products Activity</h3>
      <hr class="mb-4">
      <table class="table table-bordered table-inverse table-image">
         <thead class="thead-default text-uppercase">
            <tr>
               <th class="rounded-start">#</th>
               <th>Nama</th>
               <th>Email</th>
               <th>Role</th>
               <th>Activity</th>
               <th>Target</th>
               <th class="rounded-end">Time</th>
            </tr>
         </thead>
         <tbody>
            @forelse ($products as $item)
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
                     <h4>There is no log activity data have stored.</h4>
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
