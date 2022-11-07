@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-10 mx-auto'>
         <div class='card'>
            <div class="card-header p-3">
               <div class='row'>
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Editar cliente #{{ $client->id }}</h6>
                     </div>
                  </div>
               </div>
            </div>

            <form class='card-body' method="POST" action="{{ url('/clients/'.$client->id) }}">
               @csrf

               @method('PUT')

               <div class='row'>
                  <div class='col-md'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Nombre</label>

                        <input
                           class="form-control"
                           type="text"
                           placeholder="Ingrese el nombre"
                           name="name"
                           value="{{ old('name', $client->name) }}"
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
                           value="{{ old('dni', $client->dni) }}"
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
                           value="{{ old('phone', $client->phone) }}"
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
                           value="{{ old('address', $client->address) }}"
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