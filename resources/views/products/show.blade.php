@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-7 mx-auto'>
         <div class='card'>
            <div class='card-header p-3'>
               <h6 class="mb-0">Producto #{{ $product->id }}</h6>
            </div>

            <div class='card-body'>
               <div class='row'>
                  <div class='col'>
                     <span class="text-xs fw-bolder text-dark">Nombre:</span>

                     <p class="fw-bold">{{ $product->name }}</p>
                  </div>
               </div>

               <div class='row'>
                  <div class='col-md'>
                     <span class='text-xs fw-bolder text-dark'>Precio compra:</span>

                     <p class='fw-bold'>{{ $product->buy_price }}</p>
                  </div>

                  <div class='col-md'>
                     <span class='text-xs fw-bolder text-dark'>Precio venta:</span>

                     <p class='fw-bold'>{{ $product->sell_price }}</p>
                  </div>

                  <div class='col-md-3'>
                     <span class='text-xs fw-bolder text-dark'>Stock:</span>

                     <p class='fw-bold'>{{ $product->stock }}</p>
                  </div>
               </div>

               <div class='row mt-4'>
                  <div class='col'>
                     <form
                        class='d-flex justify-content-end gap-3'
                        method="POST"
                        action="{{ url('products/'.$product->id) }}"
                     >
                        @csrf
                        
                        @method('DELETE')

                        <button
                           type="button"
                           class="btn btn-info mb-0"
                           data-bs-toggle="modal"
                           data-bs-target="#stockModal"
                           id="stock-btn"
                           @error('stock') data-error='true' @enderror
                        >Incrementar stock</button>

                        <button
                           type="submit"
                           class="btn btn-danger mb-0"
                        >Eliminar</button>

                        <a
                           href='{{ url('products/'.$product->id.'/edit') }}'
                           class="btn btn-warning mb-0"
                        >Editar</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
 
   <!-- Modal -->
   <div
      class="modal fade"
      id="stockModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="stockModalLabel"
      aria-hidden="true"
   >
      <div class="modal-dialog modal-dialog-centered" role="document">
         <form class="modal-content" method="POST" action="{{ url('/products/stock/'.$product->id) }}">
            @csrf

            @method('PUT')

            <div class="modal-header align-items-center">
               <h5 class="modal-title" id="stockModalLabel">{{ $product->name }}</h5>

               <button
                  type="button"
                  class="btn-close text-dark h3" 
                  style="line-height: 70%;"
                  data-bs-dismiss="modal"
                  aria-label="Close"
               >
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <div class="modal-body">
               <div class='row'>
                  <div class='col'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">cantidad a incrementar</label>

                        <input
                           class="form-control"
                           type="number"
                           min="1"
                           placeholder="Ingrese la cantidad a incrementar"
                           name="stock"
                           value="{{ old('stock', '') }}"
                           required
                        >

                        @error('stock')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

               <button type="submit" class="btn btn-success">Incrementar</button>
            </div>
         </form>
      </div>
   </div>

   <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", () => {
         const stockBtn = document.querySelector('#stock-btn');

         if (stockBtn.dataset.error) {
            stockBtn.click();
         }
      });
   </script>
@endsection