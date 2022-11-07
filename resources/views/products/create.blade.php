@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-10 mx-auto'>
         <div class='card'>
            <div class="card-header p-3">
               <div class='row'>
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Nuevo producto</h6>
                     </div>
                  </div>
               </div>
            </div>

            <form class='card-body' method="POST" action="{{ url('/products') }}">
               @csrf

               @method('POST')

               <div class='row'>
                  <div class='col'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Nombre</label>

                        <input
                           class="form-control"
                           type="text"
                           placeholder="Ingrese el nombre"
                           name="name"
                           value="{{ old('name', '') }}"
                        >

                        @error('name')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>
               </div>

               <div class='row'>
                  <div class='col-md-4'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Precio compra</label>

                        <input
                           class="form-control"
                           type="number"
                           min="0.01"
                           step="0.01"
                           placeholder="Ingrese el precio de compra"
                           name="buy_price"
                           value="{{ old('buy_price', '') }}"
                        >

                        @error('buy_price')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>

                  <div class='col-md-4'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Precio venta</label>

                        <input
                           class="form-control"
                           type="number"
                           min="0.01"
                           step="0.01"
                           placeholder="Ingrese el precio de venta"
                           name="sell_price"
                           value="{{ old('sell_price', '') }}"
                        >

                        @error('sell_price')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>

                  <div class='col-md-4'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Stock</label>

                        <input
                           type="number"
                           class="form-control"
                           name="stock"
                           placeholder="Cantidad de productos"
                           min="0"
                           step="1"
                           value="{{ old('stock', '') }}"
                        >

                        @error('stock')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>
               </div>

               <div class='row'>
                  <div class='col'>
                     <div class='d-flex justify-content-end'>
                        <button
                           type="submit"
                           class="btn btn-success mb-0"
                        >Guardar producto</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection