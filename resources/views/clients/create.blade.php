@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-10 mx-auto'>
         <div class='card'>
            <div class="card-header p-3">
               <div class='row'>
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Nuevo cliente</h6>
                     </div>
                  </div>
               </div>
            </div>

            <form class='card-body' method="POST" action="{{ url('/clients') }}">
               @csrf

               @method('POST')

               <div class='row'>
                  <div class='col-md'>
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

                  <div class='col-md'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Cédula</label>

                        <input
                           class="form-control clean-input"
                           type="number"
                           placeholder="Ingrese la cédula"
                           name="dni"
                           value="{{ old('dni', '') }}"
                        >

                        @error('dni')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>

                  <div class='col-md'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Teléfono</label>

                        <input
                           class="form-control clean-input"
                           type="number"
                           placeholder="Ingrese el teléfono"
                           name="phone"
                           value="{{ old('phone', '') }}"
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
                           type="text"
                           class="form-control"
                           name="address"
                           placeholder="Ingrese la dirección"
                           min="0"
                           step="1"
                           value="{{ old('address', '') }}"
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
                     <div class='d-flex justify-content-end'>
                        <button
                           type="submit"
                           class="btn btn-success mb-0"
                        >Guardar cliente</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection