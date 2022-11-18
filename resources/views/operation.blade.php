@extends('layouts.operation')

@section('content')
   @if (!$allow && !$errors->any())
      <div class='client-modal-container' id="modal">
         <div class='client-modal'>
            <form
               method="POST"
               @if(isset($dni))
                  action="{{ url('sale/client/create') }}"
               @else
                  action="{{ url('/sale/client') }}"
               @endif
               class='card'
            >
               <div class='card-header pb-1'>
                  @if (isset($dni))
                     <h6 class="mb-0">Nuevo cliente</h6>
                  @elseif (isset($client))
                     <h6 class="mb-0">Información del cliente</h6>
                  @else
                     <h6 class="mb-0">Buscar cliente</h6>
                  @endif
               </div>

               <div class='card-body pt-1'>
                  <div class='row'>
                     <div class='col'>
                        <div class="form-group">
                           <label class="ms-3 mb-1">Cédula</label>

                           @csrf

                           <input
                              class="form-control clean-input"
                              type="number"
                              placeholder="Ingrese la cédula"
                              name="dni"
                              value="{{ old('dni', isset($dni) ? $dni : (isset($client) ? $client->dni : '')) }}"
                              @if ($dni_disabled) disabled @endif
                              @if ($dni_readonly) readonly @endif
                           >

                           @error('dni')
                              <label class='ms-2 text-danger'>
                                 {{ $message }}
                              </label>
                           @enderror
                        </div>
                     </div>
                  </div>

                  <hr class="horizontal dark my-1">

                  <div class='row'>
                     <div class='col'>
                        <div class="form-group">
                           <label class="ms-3 mb-1">Nombre</label>

                           <input
                              class="form-control"
                              type="text"
                              placeholder="Ingrese el nombre"
                              name="name"
                              value="{{ old('name', isset($client) ? $client->name : '') }}"
                              @if ($client_disabled) disabled @endif
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
                     <div class='col'>
                        <div class="form-group">
                           <label class="ms-3 mb-1">Teléfono</label>

                           <input
                              class="form-control"
                              type="text"
                              placeholder="Ingrese el teléfono"
                              name="phone"
                              value="{{ old('phone', isset($client) ? $client->phone : '') }}"
                              @if ($client_disabled) disabled @endif
                           >

                           @error('phone')
                              <label class='ms-2 text-danger'>
                                 {{ $message }}
                              </label>
                           @enderror
                        </div>
                     </div>
                  </div>

                  <div class='row'>
                     <div class='col'>
                        <div class="form-group">
                           <label class="ms-3 mb-1">Dirección</label>

                           <input
                              class="form-control"
                              type="text"
                              placeholder="Ingrese el nombre"
                              name="address"
                              value="{{ old('address', isset($client) ? $client->address : '') }}"
                              @if ($client_disabled) disabled @endif
                           >

                           @error('address')
                              <label class='ms-2 text-danger'>
                                 {{ $message }}
                              </label>
                           @enderror
                        </div>
                     </div>
                  </div>
                  
                  <div class='row'>
                     <div class='col'>
                        <div class='d-flex justify-content-end gap-2'>
                           @if (isset($client))
                              <a
                                 href="{{ url('/sale') }}"
                                 class="btn btn-sm btn-warning"
                              ><i class='fas fa-search me-2'></i>Buscar cliente</a>

                              <button
                                 type="button"
                                 class="btn btn-sm btn-primary"
                                 id="close-btn"
                              ><i class='fas fa-arrow-circle-right me-2'></i>Continuar</button>

                              <script type="text/javascript">
                                 const closeBtn = document.querySelector('#close-btn');
                                 const modal = document.querySelector('#modal');
                                 
                                 closeBtn.addEventListener('click', () => modal.style.display = 'none');
                              </script>
                           @else
                              @if (isset($dni))
                                 <button
                                    type="submit"
                                    class="btn btn-sm btn-success"
                                 ><i class='far fa-save me-2'></i>Guardar cliente</button>
                              @else
                                 <button
                                    type="submit"
                                    class="btn btn-sm btn-primary"
                                 ><i class='fas fa-search me-2'></i>Buscar cliente</button>
                              @endif
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>

         @include('components.operation-logout')
      </div>
   @endif

   <input disabled type='hidden' name='old_cart' value="{{ json_encode(old('cart')) }}" id="old-cart">

   <?php $el = (array) $errors; ?>

   <input disabled type='hidden' name='old_cart_errors' value="{{ json_encode($el) }}" id="old-cart-errors">

   <div class='row'>
      <form class='col-md-7' method="POST" action="{{ url('/sale') }}">
         @csrf

         @if (isset($client))
            <input type='hidden' name='client_id' value="{{ $client->id }}">
         @endif

         <div class="card">

            <div class="card-header pb-0 p-3">
               <div class="d-flex align-items-center">
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex">
                        <h6 class="mb-0">Carrito de venta</h6>
                     </div>
                  </div>

                  <div class="col-md-6 mb-2 mb-md-0 text-end">
                     <button
                        type="submit"
                        class="btn btn-xs bg-success text-white mb-0"
                     >
                        <i class="fas fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Finalizar venta
                     </button>
                  </div>
               </div>
            </div>

            <div class="table-responsive pb-3">
               <table class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th class="text-sm text-center fw-bolder p-2">Nombre</th>

                        <th class="text-sm text-center fw-bolder p-2">Cantidad</th>

                        <th class="text-sm text-center fw-bolder p-2">Precio</th>

                        <th class="text-sm text-center fw-bolder p-2">Subtotal</th>

                        <th></th>
                     </tr>
                  </thead>

                  <tbody id="cart-body">
                     {{-- <tr>
                        <td class="text-sm text-center p-2">Refresco</td>

                        <td class="text-sm text-center p-2">
                           <div class='d-flex justify-content-center align-items-center gap-2'>
                              <i class='fas fa-minus-circle text-primary text-lg pointer'></i>
                              
                              <input class="operation-input" type='number' name='quantity[]' value="2" disabled>
                              <input type='hidden' name='id[]'>

                              <i class='fas fa-plus-circle text-primary text-lg pointer'></i>
                           </div>
                        </td>

                        <td class="text-sm text-center p-2">1000</td>

                        <td class="text-sm text-center p-2 fw-bold">2000</td>

                        <td class="text-sm text-center p-2">
                           <button class="btn btn-link text-danger py-1 px-2 mb-0">
                              <i class="fas fa-trash-alt text-danger me-2"></i>Eliminar
                           </button>
                        </td>
                     </tr> --}}
                  </tbody>
               </table>
            </div>
         </div>
      </form>

      <div class='col-md-5 mt-4 mt-md-0'>
         <div
            class='d-flex flex-column position-sticky top-0'
            style="height: calc(100vh - 124.39px); padding-top: 2rem; margin-top: -2rem;"
         >
            <div class='card flex-grow-1 overflow-auto scroll-bar'>
               <div class="card-header pb-0 p-3">
                  <div class="d-flex justify-content-between">
                     <h6 class="mb-0">Carrito de venta</h6>
                  </div>
               </div>

               <div class='card-body d-flex flex-column p-3'>
                  <form class='d-flex gap-2' id="search-form">
                     <input
                        class="form-control"
                        type="text"
                        placeholder="Ingrese el nombre del producto a buscar"
                        id="search-input"
                     >

                     <button type="submit" class='btn btn-primary mb-0 px-3'>Buscar</button>

                     <button type="button" class='btn btn-warning mb-0 px-3' id="clean-btn">Limpiar</button>
                  </form>

                  <div class="table-responsive mt-2 flex-grow-1 scroll-bar scroll-x">
                     <table class="table align-items-center mb-0">
                        <thead>
                           <tr>
                              <th class="text-sm text-center fw-bolder p-2">Nombre</th>
      
                              <th class="text-sm text-center fw-bolder p-2">Precio</th>
      
                              <th class="text-sm text-center fw-bolder p-2">Stock</th>
      
                              <th></th>
                           </tr>
                        </thead>
      
                        <tbody id="tbody">
                           {{-- <tr>
                              <td class="text-xs text-center p-2">Refresco</td>
      
                              <td class="text-xs text-center p-2">1000</td>
      
                              <td class="text-xs text-center p-2">2</td>
      
                              <td class="text-xs text-center p-2">
                                 <button class="btn btn-link text-info text-xs py-1 px-2 mb-0">
                                    <i class="fas fa-plus text-info me-2"></i>Agregar
                                 </button>
                              </td>
                           </tr> --}}
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
                           <p style="line-height: 90%" class="mb-0 fw-bold"><small>Cliente:</small></p>
   
                           <p style="line-height: 90%" class="mb-0"><small>{{ isset($client) ? $client->name : '' }}</small></p>
                        </div>
                     </div>
   
                     <div class='col-md-6'>
                        <div class='d-flex gap-1 justify-content-between'>
                           <p style="line-height: 90%" class="mb-0 fw-bold"><small>Cantidad de productos:</small></p>
   
                           <p style="line-height: 90%" class="mb-0 text-primary"><small id="total-qty">0</small></p>
                        </div>
                     </div>
                  </div>
   
                  <div class='row mt-3'>
                     <div class='col-md-6'>
                        <div class='d-flex gap-1 justify-content-between'>
                           <p style="line-height: 90%" class="mb-0 fw-bold"><small>Teléfono:</small></p>
   
                           <p style="line-height: 90%" class="mb-0"><small>{{ isset($client) ? $client->phone : '' }}</small></p>
                        </div>
                     </div>
   
                     <div class='col-md-6'>
                        <div class='d-flex gap-1 justify-content-between'>
                           <p style="line-height: 90%" class="mb-0 fw-bolder">Total:</p>
   
                           <p style="line-height: 90%" class="mb-0 fw-bolder text-warning" id="total">0.00</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src='{{ asset('/js/index.js') }}'></script>
@endsection