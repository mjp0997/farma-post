@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-7'>
         <div class='card'>
            <div class='card-header p-3 pb-0'>
               <h6 class="mb-0">Venta #{{ $sale->id }}</h6>
            </div>

            <div class='card-body d-flex flex-column p-3'>
               <div class="table-responsive mt-2 scroll-bar scroll-x">
                  <table class="table align-items-center mb-0">
                     <thead>
                        <tr>
                           <th class="text-sm text-center fw-bolder p-2">Producto</th>
   
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
      </div>

      <div class='col-md-5'>
         <div class='card'>
            <div class='card-body d-flex flex-column p-3 gap-3'>
               <p class="fw-bold text-dark mb-0">Cliente</p>

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

         <div class='card mt-4'>
            <div class='card-body d-flex flex-column p-3 gap-3'>
               <p class="fw-bold text-dark mb-0">Venta</p>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Total:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold text-primary">{{ $sale->total }}</p>
               </div>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Cantidad de productos:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold">{{ $sale->total_products }}</p>
               </div>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Fecha:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold">{{ $sale->date }} {{ $sale->time }}</p>
               </div>

               <div class='d-flex gap-1 justify-content-between'>
                  <p style="line-height: 90%" class="mb-0 text-sm">Vendedor:</p>

                  <p style="line-height: 90%" class="mb-0 text-sm fw-bold">{{ $sale->user->name }}</p>
               </div>
            </div>
         </div>

         <div class='d-flex justify-content-end mt-4'>
            <a
               href="{{ url('/sales') }}"
               class="btn btn-sm btn-warning"
            >Volver a la lista</a>
         </div>
      </div>
   </div>
@endsection