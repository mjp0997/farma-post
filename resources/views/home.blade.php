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

   <div class='row mt-4'>
      <div class='col'>
         <div class="card ">
            <div class="card-header pb-0 p-3">
               <div class="d-flex justify-content-between">
                  <h6 class="mb-2">Productos más vendidos del día</h6>
               </div>
            </div>

            <div class='d-flex flex-column p-3 gap-3'>
               @if (count($today_products_stats) > 0)
                  @foreach ($today_products_stats as $stat)
                     <div class='d-flex align-items-center gap-3'>
                        <div
                           class="flex-shrink-0 text-end"
                           style="width: 25%;"
                           title="Producto: {{ $stat->product->name }}"
                        >
                           <p class='mb-0 text-sm' style="line-height: 110%">{{ $stat->product->name }}</p>
                        </div>

                        <div
                           class='flex-shrink-0 d-flex gauge'
                           style="width: 75%; height: 1rem; margin-right: 10%;"
                           data-quantity="{{ $stat->sold_quantity }}"
                           data-width="{{ $stat->percent_quantity.'%' }}"
                        >
                           <div
                              style="width: {{ $stat->percent_quantity }}%; height: 100%;"
                              class="bg-primary rounded"
                              title="Cantidad de {{ $stat->product->name }} vendidos(as): {{ $stat->sold_quantity }}"
                           ></div>
                        </div>
                     </div>
                  @endforeach
               @else
                  <p class="mb-0 text-center">No se han realizado ventas en el día</p>
               @endif
            </div>
         </div>
      </div>
   </div>

   <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
         <div class="card ">
            <div class="card-header pb-0 p-3">
               <div class="d-flex justify-content-between">
                  <h6 class="mb-2">Últimas ventas del día</h6>
               </div>
            </div>

            <div class="table-responsive">
               <table class="table align-items-center ">
                  <tbody>
                     @if (count($recent_sales) > 0)
                        @foreach ($recent_sales as $sale)
                           <tr>
                              <td>
                                 <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                       <p class="text-xs font-weight-bold mb-0">Cliente:</p>

                                       <h6 class="text-sm mb-0">{{ $sale->client->name }}</h6>
                                    </div>
                                 </div>
                              </td>
                           
                              <td>
                                 <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0"># productos:</p>

                                    <h6 class="text-sm mb-0">{{ $sale->total_products }}</h6>
                                 </div>
                              </td>

                              <td>
                                 <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Total:</p>

                                    <h6 class="text-sm mb-0">{{ $sale->total }}</h6>
                                 </div>
                              </td>

                              <td class="align-middle text-sm">
                                 <div class="col text-center">
                                    <p class="text-xs font-weight-bold mb-0">Hora:</p>

                                    <h6 class="text-sm mb-0">{{ $sale->time }}</h6>
                                 </div>
                              </td>

                              <td>
                                 <div class="d-flex">
                                    <a href="{{ url('/sales/'.$sale->id) }}" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                                 </div>
                              </td>
                           </tr>
                        @endforeach
                     @else
                        <tr>
                           <p class="mb-0 text-center">No hay ventas que mostrar</p>
                        </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <div class="col-lg-5">
         <div class="card">
            <div class="card-header pb-0 p-3">
               <h6 class="mb-0">Productos con stock bajo</h6>
            </div>

            <div class="card-body p-3">
               <ul class="list-group">
                  @if (count($low_stock_products) > 0)
                     @foreach ($low_stock_products as $product)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                           <div class="d-flex align-items-center">
                              <div class="d-flex flex-column">
                                 <h6 class="mb-1 text-dark text-sm">{{ $product->name }}</h6>

                                 <span class="text-xs">{{ $product->stock }} en stock</span>
                              </div>
                           </div>

                           <div class="d-flex">
                              <a href="{{ url('/products/'.$product->id) }}" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                           </div>
                        </li>
                     @endforeach
                  @else
                     <li class="list-group-item border-0 d-flex justify-content-center ps-0 mb-2 border-radius-lg">No hay productos con stock bajo...</li>
                  @endif
               </ul>
            </div>
         </div>
      </div>
   </div>
@endsection