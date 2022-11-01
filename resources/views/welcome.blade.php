<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />

   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   <link rel="icon" type="image/png" href="./assets/img/favicon.png">

   <title>Argon Dashboard 2 by Creative Tim</title>

   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <!-- Nucleo Icons -->
   <link href="{{ asset('/css/nucleo-icons.css') }}" rel="stylesheet" />
   <link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
   <!-- CSS Files -->
   <link id="pagestyle" href="{{ asset('/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
   <div class="min-height-300 bg-primary position-absolute w-100"></div>

   @include('components.sidebar')

   <main class="main-content position-relative border-radius-lg ">
      @include('components.nav')

      <div class="container-fluid py-4">
         {{-- Tiny cards --}}
         <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-body p-3">
                     <div class="row">
                        <div class="col-8">
                           <div class="numbers">
                              <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>

                              <h5 class="font-weight-bolder">
                                 $53,000
                              </h5>
                              
                              <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">+55%</span>
                                 since yesterday
                              </p>
                           </div>
                        </div>

                        <div class="col-4 text-end">
                           <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-body p-3">
                     <div class="row">
                        <div class="col-8">
                           <div class="numbers">
                              <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>

                              <h5 class="font-weight-bolder">
                                 2,300
                              </h5>

                              <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">+3%</span>
                                 since last week
                              </p>
                           </div>
                        </div>

                        <div class="col-4 text-end">
                           <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-body p-3">
                     <div class="row">
                        <div class="col-8">
                           <div class="numbers">
                              <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>

                              <h5 class="font-weight-bolder">
                                 +3,462
                              </h5>

                              <p class="mb-0">
                                 <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                 since last quarter
                              </p>
                           </div>
                        </div>

                        <div class="col-4 text-end">
                           <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                              <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-3 col-sm-6">
               <div class="card">
                  <div class="card-body p-3">
                     <div class="row">
                        <div class="col-8">
                           <div class="numbers">
                              <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>

                              <h5 class="font-weight-bolder">
                                 $103,430
                              </h5>

                              <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                              </p>
                           </div>
                        </div>

                        <div class="col-4 text-end">
                           <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      
         <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
               <div class="card ">
                  <div class="card-header pb-0 p-3">
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Sales by Country</h6>
                     </div>
                  </div>

                  <div class="table-responsive">
                     <table class="table align-items-center ">
                        <tbody>
                           <tr>
                              <td class="w-30">
                                 <div class="d-flex px-2 py-1 align-items-center">
                                    <div>
                                       <img src="./assets/img/icons/flags/US.png" alt="Country flag">
                                    </div>

                                    <div class="ms-4">
                                       <p class="text-xs font-weight-bold mb-0">Country:</p>

                                       <h6 class="text-sm mb-0">United States</h6>
                                    </div>
                                 </div>
                              </td>
                           
                              <td>
                                 <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Sales:</p>

                                    <h6 class="text-sm mb-0">2500</h6>
                                 </div>
                              </td>

                              <td>
                                 <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Value:</p>

                                    <h6 class="text-sm mb-0">$230,900</h6>
                                 </div>
                              </td>

                              <td class="align-middle text-sm">
                                 <div class="col text-center">
                                    <p class="text-xs font-weight-bold mb-0">Bounce:</p>

                                    <h6 class="text-sm mb-0">29.9%</h6>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="col-lg-5">
               <div class="card">
                  <div class="card-header pb-0 p-3">
                     <h6 class="mb-0">Categories</h6>
                  </div>

                  <div class="card-body p-3">
                     <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                           <div class="d-flex align-items-center">
                              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                 <i class="ni ni-mobile-button text-white opacity-10"></i>
                              </div>

                              <div class="d-flex flex-column">
                                 <h6 class="mb-1 text-dark text-sm">Devices</h6>

                                 <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                              </div>
                           </div>

                           <div class="d-flex">
                              <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

   <div class="fixed-plugin">
      <div class="card shadow-lg">
         <div class="card-header pb-0 pt-3">
            <div class="float-start">
               <h5 class="mt-3 mb-0">Argon Configurator</h5>
               <p>See our dashboard options.</p>
            </div>
            
            <div class="float-end mt-4">
               <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                  <i class="fa fa-close"></i>
               </button>
            </div>
         </div>

         <hr class="horizontal dark my-1">

         <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <!-- Sidebar Backgrounds -->
            <div>
               <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
               <div class="badge-colors my-2 text-start">
                  <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
               </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
               <h6 class="mb-0">Sidenav Type</h6>
               <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
               <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
               <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="d-flex my-3">
               <h6 class="mb-0">Navbar Fixed</h6>
               <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
               </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="mt-2 mb-5 d-flex">
               <h6 class="mb-0">Light / Dark</h6>
               <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
               </div>
            </div>
            <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
            <div class="w-100 text-center">
               <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
               <h6 class="mt-3">Thank you for sharing!</h6>
               <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                  <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
               </a>
               <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                  <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
               </a>
            </div>
         </div>
      </div>
   </div>
   <!--   Core JS Files   -->
   <script src="{{ asset('/js/core/popper.min.js') }}"></script>
   <script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
   <script src="{{ asset('/js/plugins/perfect-scrollbar.min.js') }}"></script>
   <script src="{{ asset('/js/plugins/smooth-scrollbar.min.js') }}"></script>
   <script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>

   <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
         var options = {
         damping: '0.5'
         }
         Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
   </script>
   <!-- Github buttons -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="{{ asset('/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>