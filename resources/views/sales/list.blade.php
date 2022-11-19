@extends('layouts.dashboard')

@section('content')
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-header pb-0 p-3">
               <div class='row align-items-center'>
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Listado de ventas</h6>
                     </div>
                  </div>
               </div>
            </div>

            <div class="table-responsive">
               <table class="table align-items-center">
                  <thead>
                     <tr>
                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs">ID</p>
                           </div>
                        </th>
                     
                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs">Fecha:</p>
                           </div>
                        </th>

                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs">Cliente:</p>
                           </div>
                        </th>

                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs">Total:</p>
                           </div>
                        </th>

                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs"># productos:</p>
                           </div>
                        </th>

                        <th></th>
                     </tr>
                  </thead>

                  <tbody>
                     @foreach ($sales as $sale)
                        <tr>
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $sale->id }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $sale->date }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $sale->client->name }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $sale->total }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $sale->total_products }}</p>
                              </div>
                           </td>

                           <td>
                              <div class='text-center'>
                                 <a
                                    href='{{ url('/sales/'.$sale->id) }}'
                                    class="btn btn-link text-dark px-3 mb-0"
                                 >
                                    <i class="fas fa-info-circle text-dark me-2" aria-hidden="true"></i>Ver
                                 </a>
                              </div>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>

            {{ $sales->links() }}
         </div>
      </div>
   </div>
@endsection