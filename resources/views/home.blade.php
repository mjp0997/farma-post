@extends('layouts.dashboard')

@section('content')
   {{-- Tiny cards --}}
   <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-body p-3">
               <div class="row">
                  <div class="col-8">
                     <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Clientes de hoy</p>

                        <h5 class="font-weight-bolder">
                           {{ $clients }}
                        </h5>

                        {{-- <p class="mb-0">
                           <span class="text-success text-sm font-weight-bolder">+3%</span>
                           since last week
                        </p> --}}
                     </div>
                  </div>

                  <div class="col-4 text-end">
                     <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
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
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Clientes nuevos</p>

                        <h5 class="font-weight-bolder">
                           {{ $new_clients > 0 ? '+'.$new_clients : 0 }}
                        </h5>

                        {{-- <p class="mb-0">
                           <span class="text-danger text-sm font-weight-bolder">-2%</span>
                           since last quarter
                        </p> --}}
                     </div>
                  </div>

                  <div class="col-4 text-end">
                     <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                        <i class="fas fa-user-plus text-lg opacity-10" aria-hidden="true"></i>
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
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Ventas</p>

                        <h5 class="font-weight-bolder">
                           {{ $today_sales }}
                        </h5>

                        {{-- <p class="mb-0">
                           <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                        </p> --}}
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

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-body p-3">
               <div class="row">
                  <div class="col-8">
                     <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Ganancias</p>

                        <h5 class="font-weight-bolder">
                           {{ $earnings }}
                        </h5>
                        
                        {{-- <p class="mb-0">
                           <span class="text-success text-sm font-weight-bolder">+55%</span>
                           since yesterday
                        </p> --}}
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
@endsection