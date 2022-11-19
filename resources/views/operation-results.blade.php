@extends('layouts.operation')

@section('content')
   <div class='row'>
      <div class='col-md-8 mt-4 mt-md-0'>
         <div
            class='d-flex flex-column position-sticky top-0'
            style="height: calc(100vh - 92px); padding-top: 2rem; margin-top: -2rem;"
         >
            <div class='card flex-grow-1 overflow-auto scroll-bar'>
               <div class="card-header pb-0 p-3">
                  <div class="d-flex justify-content-between">
                     <h6 class="mb-0">Listado de productos</h6>
                  </div>
               </div>

               <div class='card-body d-flex flex-column p-3'>
                  <div class="table-responsive mt-2 flex-grow-1 scroll-bar scroll-x">
                     <table class="table align-items-center mb-0">
                        <thead>
                           <tr>
                              <th class="text-sm text-center fw-bolder p-2">Nombre</th>
      
                              <th class="text-sm text-center fw-bolder p-2">Precio</th>
      
                              <th class="text-sm text-center fw-bolder p-2">Cantidad</th>

                              <th class="text-sm text-center fw-bolder p-2">Subtotal</th>
                           </tr>
                        </thead>
      
                        <tbody id="tbody">
                           @foreach ($sale->saleslines as $salesline)
                              <tr>
                                 <td class="text-xs text-center p-2">{{ $salesline->product->name }}</td>
         
                                 <td class="text-xs text-center p-2">{{ $salesline->price }}</td>
         
                                 <td class="text-xs text-center p-2">{{ $salesline->quantity }}</td>
                                 
                                 <td class="text-xs text-center p-2">{{ $salesline->sub_total }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
   
            <div class='card mt-4'>
               <div class='card-body p-3'>
                  <div class='row'>
                     <div class='col-md-6'>
                        <div class='d-flex gap-1 justify-content-between'>
                           <p style="line-height: 90%" class="mb-0 fw-bold"><small>Cantidad de productos:</small></p>
   
                           <p style="line-height: 90%" class="mb-0 text-primary"><small id="total-qty">0</small></p>
                        </div>
                     </div>

                     <div class='col-md-6'>
                        <div class='d-flex gap-1 justify-content-between'>
                           <p style="line-height: 90%" class="mb-0 fw-bolder">Total:</p>
   
                           <p style="line-height: 90%" class="mb-0 fw-bolder text-warning" id="total">{{ $sale->total }}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class='col-md-4'>
         <div class='card'>
            <div class="card-header pb-0 p-3">
               <div class="d-flex justify-content-between">
                  <h6 class="mb-0">Cliente</h6>
               </div>
            </div>

            <div class='card-body d-flex flex-column p-3 gap-4'>
               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Nombre:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold text-primary">{{ $sale->client->name }}</p>
               </div>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Cédula:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold">{{ $sale->client->dni }}</p>
               </div>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Teléfono:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold">{{ $sale->client->phone }}</p>
               </div>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Dirección:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold">{{ $sale->client->address }}</p>
               </div>
            </div>
         </div>

         <div class='d-flex justify-content-end mt-4'>
            <a
               href="{{ url('/sale') }}"
               class="btn btn-sm btn-success"
            ><i class='fas fa-plus me-2'></i>Nueva venta</a>
         </div>
      </div>
   </div>
@endsection