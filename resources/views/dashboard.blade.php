@extends('layouts.app')

@section('content')
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>

         </div>
      </div>
   </div>
   <!-- end page title -->

   <div class="row">
      <div class="col-xl-4">
         <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
               <div class="row">
                  <div class="col-7">
                     <div class="text-primary p-3">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p>Skote Dashboard</p>
                     </div>
                  </div>
                  <div class="col-5 align-self-end">
                     <img src="{{ asset('') }}assets/images/profile-img.png" alt="" class="img-fluid">
                  </div>
               </div>
            </div>
            <div class="card-body pt-0">
               <div class="row">
                  <div class="col-sm-4">
                     <div class="avatar-md profile-user-wid mb-4">
                        <img src="{{ asset('') }}assets/images/users/waifu.png" alt=""
                           class="img-thumbnail rounded-circle">
                     </div>
                     <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                     <p class="text-muted mb-0 text-truncate">{{ Auth::user()->role->name }}</p>
                  </div>

                  <div class="col-sm-8">
                     <div class="pt-4">

                        <div class="row">
                           <div class="col-6">
                              <h5 class="font-size-15">125</h5>
                              <p class="text-muted mb-0">Projects</p>
                           </div>
                           <div class="col-6">
                              <h5 class="font-size-15">$1245</h5>
                              <p class="text-muted mb-0">Revenue</p>
                           </div>
                        </div>
                        <div class="mt-4">
                           <a href="javascript: void(0);"
                              class="btn btn-primary waves-effect waves-light btn-sm">View
                              Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <div class="col-xl-8">
         <div class="row">
            <div class="col-md-4">
               <div class="card mini-stats-wid">
                  <div class="card-body">
                     <div class="d-flex">
                        <div class="flex-grow-1">
                           <p class="text-muted fw-medium">Produk</p>
                           <h4 class="mb-0">{{ $jumlahProduct }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                           <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                              <span class="avatar-title">
                                 <i class="bx bx-archive-in font-size-24"></i>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card mini-stats-wid">
                  <div class="card-body">
                     <div class="d-flex">
                        <div class="flex-grow-1">
                           <p class="text-muted fw-medium">User</p>
                           <h4 class="mb-0">{{ $jumlahUser }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center ">
                           <div class="avatar-sm rounded-circle bg-success mini-stat-icon">
                              <span class="avatar-title rounded-circle bg-success">
                                 <i class="bx bx-user font-size-24"></i>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card mini-stats-wid">
                  <div class="card-body">
                     <div class="d-flex">
                        <div class="flex-grow-1">
                           <p class="text-muted fw-medium">Kategori</p>
                           <h4 class="mb-0">{{ $jumlahCategory }}</h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                           <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                              <span class="avatar-title rounded-circle bg-warning">
                                 <i class="bx bx-purchase-tag-alt font-size-24"></i>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end row -->

      </div>
   </div>
   <!-- end row -->


   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title mb-4">Latest Transaction</h4>
               <div class="table-responsive">
                  <table class="table align-middle table-nowrap mb-0">
                     <thead class="table-light text-uppercase" style="font-family: poppins">
                        <tr>
                           <th style="width: 20px;">
                              <div class="form-check font-size-16 align-middle">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck01">
                                 <label class="form-check-label"
                                    for="transactionCheck01"></label>
                              </div>
                           </th>
                           <th class="align-middle">Order ID</th>
                           <th class="align-middle">Billing Name</th>
                           <th class="align-middle">Date</th>
                           <th class="align-middle">Total</th>
                           <th class="align-middle">Payment Status</th>
                           <th class="align-middle">Payment Method</th>
                           <th class="align-middle">View Details</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <div class="form-check font-size-16">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck02">
                                 <label class="form-check-label"
                                    for="transactionCheck02"></label>
                              </div>
                           </td>
                           <td><a href="javascript: void(0);"
                                 class="text-body fw-bold">#SK2540</a> </td>
                           <td>Neal Matthews</td>
                           <td>
                              07 Oct, 2019
                           </td>
                           <td>
                              $400
                           </td>
                           <td>
                              <span
                                 class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                           </td>
                           <td>
                              <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                           </td>
                           <td>
                              <!-- Button trigger modal -->
                              <button type="button"
                                 class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                 data-bs-toggle="modal"
                                 data-bs-target=".transaction-detailModal">
                                 View Details
                              </button>
                           </td>
                        </tr>

                        <tr>
                           <td>
                              <div class="form-check font-size-16">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck03">
                                 <label class="form-check-label"
                                    for="transactionCheck03"></label>
                              </div>
                           </td>
                           <td><a href="javascript: void(0);"
                                 class="text-body fw-bold">#SK2541</a> </td>
                           <td>Jamal Burnett</td>
                           <td>
                              07 Oct, 2019
                           </td>
                           <td>
                              $380
                           </td>
                           <td>
                              <span
                                 class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
                           </td>
                           <td>
                              <i class="fab fa-cc-visa me-1"></i> Visa
                           </td>
                           <td>
                              <!-- Button trigger modal -->
                              <button type="button"
                                 class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                 data-bs-toggle="modal"
                                 data-bs-target=".transaction-detailModal">
                                 View Details
                              </button>
                           </td>
                        </tr>

                        <tr>
                           <td>
                              <div class="form-check font-size-16">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck04">
                                 <label class="form-check-label"
                                    for="transactionCheck04"></label>
                              </div>
                           </td>
                           <td><a href="javascript: void(0);"
                                 class="text-body fw-bold">#SK2542</a> </td>
                           <td>Juan Mitchell</td>
                           <td>
                              06 Oct, 2019
                           </td>
                           <td>
                              $384
                           </td>
                           <td>
                              <span
                                 class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                           </td>
                           <td>
                              <i class="fab fa-cc-paypal me-1"></i> Paypal
                           </td>
                           <td>
                              <!-- Button trigger modal -->
                              <button type="button"
                                 class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                 data-bs-toggle="modal"
                                 data-bs-target=".transaction-detailModal">
                                 View Details
                              </button>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="form-check font-size-16">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck05">
                                 <label class="form-check-label"
                                    for="transactionCheck05"></label>
                              </div>
                           </td>
                           <td><a href="javascript: void(0);"
                                 class="text-body fw-bold">#SK2543</a> </td>
                           <td>Barry Dick</td>
                           <td>
                              05 Oct, 2019
                           </td>
                           <td>
                              $412
                           </td>
                           <td>
                              <span
                                 class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                           </td>
                           <td>
                              <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                           </td>
                           <td>
                              <!-- Button trigger modal -->
                              <button type="button"
                                 class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                 data-bs-toggle="modal"
                                 data-bs-target=".transaction-detailModal">
                                 View Details
                              </button>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="form-check font-size-16">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck06">
                                 <label class="form-check-label"
                                    for="transactionCheck06"></label>
                              </div>
                           </td>
                           <td><a href="javascript: void(0);"
                                 class="text-body fw-bold">#SK2544</a> </td>
                           <td>Ronald Taylor</td>
                           <td>
                              04 Oct, 2019
                           </td>
                           <td>
                              $404
                           </td>
                           <td>
                              <span
                                 class="badge badge-pill badge-soft-warning font-size-11">Refund</span>
                           </td>
                           <td>
                              <i class="fab fa-cc-visa me-1"></i> Visa
                           </td>
                           <td>
                              <!-- Button trigger modal -->
                              <button type="button"
                                 class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                 data-bs-toggle="modal"
                                 data-bs-target=".transaction-detailModal">
                                 View Details
                              </button>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="form-check font-size-16">
                                 <input class="form-check-input" type="checkbox"
                                    id="transactionCheck07">
                                 <label class="form-check-label"
                                    for="transactionCheck07"></label>
                              </div>
                           </td>
                           <td><a href="javascript: void(0);"
                                 class="text-body fw-bold">#SK2545</a> </td>
                           <td>Jacob Hunter</td>
                           <td>
                              04 Oct, 2019
                           </td>
                           <td>
                              $392
                           </td>
                           <td>
                              <span
                                 class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                           </td>
                           <td>
                              <i class="fab fa-cc-paypal me-1"></i> Paypal
                           </td>
                           <td>
                              <!-- Button trigger modal -->
                              <button type="button"
                                 class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                 data-bs-toggle="modal"
                                 data-bs-target=".transaction-detailModal">
                                 View Details
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!-- end table-responsive -->
            </div>
         </div>
      </div>
   </div>
   <!-- end row -->
@endsection

@push('scripts')
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
         var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
         gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
         gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
         var gradientDark = ctx.createLinearGradient(0, 0, 0, 225);
         gradientDark.addColorStop(0, "rgba(51, 66, 84, 1)");
         gradientDark.addColorStop(1, "rgba(51, 66, 84, 0)");
         // Line chart
         new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
               labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
               datasets: [{
                  label: "Sales ($)",
                  fill: true,
                  backgroundColor: window.theme.id === "light" ? gradientLight : gradientDark,
                  borderColor: window.theme.primary,
                  data: [
                     2115,
                     1562,
                     1584,
                     1892,
                     1587,
                     1923,
                     2566,
                     2448,
                     2805,
                     3438,
                     2917,
                     3327
                  ]
               }]
            },
            options: {
               maintainAspectRatio: false,
               legend: {
                  display: false
               },
               tooltips: {
                  intersect: false
               },
               hover: {
                  intersect: true
               },
               plugins: {
                  filler: {
                     propagate: false
                  }
               },
               scales: {
                  xAxes: [{
                     reverse: true,
                     gridLines: {
                        color: "rgba(0,0,0,0.0)"
                     }
                  }],
                  yAxes: [{
                     ticks: {
                        stepSize: 1000
                     },
                     display: true,
                     borderDash: [3, 3],
                     gridLines: {
                        color: "rgba(0,0,0,0.0)",
                        fontColor: "#fff"
                     }
                  }]
               }
            }
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         // Pie chart
         new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
               labels: ["Chrome", "Firefox", "IE", "Other"],
               datasets: [{
                  data: [4306, 3801, 1689, 3251],
                  backgroundColor: [
                     window.theme.primary,
                     window.theme.warning,
                     window.theme.danger,
                     "#E8EAED"
                  ],
                  borderWidth: 5,
                  borderColor: window.theme.white
               }]
            },
            options: {
               responsive: !window.MSInputMethodContext,
               maintainAspectRatio: false,
               legend: {
                  display: false
               },
               cutoutPercentage: 70
            }
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         // Bar chart
         new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
               labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
               datasets: [{
                  label: "This year",
                  backgroundColor: window.theme.primary,
                  borderColor: window.theme.primary,
                  hoverBackgroundColor: window.theme.primary,
                  hoverBorderColor: window.theme.primary,
                  data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                  barPercentage: .75,
                  categoryPercentage: .5
               }]
            },
            options: {
               maintainAspectRatio: false,
               legend: {
                  display: false
               },
               scales: {
                  yAxes: [{
                     gridLines: {
                        display: false
                     },
                     stacked: false,
                     ticks: {
                        stepSize: 20
                     }
                  }],
                  xAxes: [{
                     stacked: false,
                     gridLines: {
                        color: "transparent"
                     }
                  }]
               }
            }
         });
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var markers = [{
               coords: [31.230391, 121.473701],
               name: "Shanghai"
            },
            {
               coords: [28.704060, 77.102493],
               name: "Delhi"
            },
            {
               coords: [6.524379, 3.379206],
               name: "Lagos"
            },
            {
               coords: [35.689487, 139.691711],
               name: "Tokyo"
            },
            {
               coords: [23.129110, 113.264381],
               name: "Guangzhou"
            },
            {
               coords: [40.7127837, -74.0059413],
               name: "New York"
            },
            {
               coords: [34.052235, -118.243683],
               name: "Los Angeles"
            },
            {
               coords: [41.878113, -87.629799],
               name: "Chicago"
            },
            {
               coords: [51.507351, -0.127758],
               name: "London"
            },
            {
               coords: [40.416775, -3.703790],
               name: "Madrid "
            }
         ];
         var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
               initial: {
                  r: 9,
                  stroke: window.theme.white,
                  strokeWidth: 7,
                  stokeOpacity: .4,
                  fill: window.theme.primary
               },
               hover: {
                  fill: window.theme.primary,
                  stroke: window.theme.primary
               }
            },
            regionStyle: {
               initial: {
                  fill: window.theme["gray-200"]
               }
            },
            zoomOnScroll: false
         });
         window.addEventListener("resize", () => {
            map.updateSize();
         });
         setTimeout(function() {
            map.updateSize();
         }, 250);
      });
   </script>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
         var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
         document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
            nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
            defaultDate: defaultDate
         });
      });
   </script>
@endpush
