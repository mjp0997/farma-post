@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-10 mx-auto'>
         <div class='card'>
            <div class="card-header p-3">
               <div class='row'>
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Editar usuario #{{ $user->id }}</h6>
                     </div>
                  </div>
               </div>
            </div>

            <form class='card-body' method="POST" action="{{ url('/users/'.$user->id) }}">
               @csrf

               @method('PUT')

               <div class='row'>
                  <div class='col'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Nombre</label>

                        <input
                           class="form-control"
                           type="text"
                           placeholder="Ingrese el nombre"
                           name="name"
                           value="{{ old('name', $user->name) }}"
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
                        <label class="ms-3 mb-1">Nombre de usuario</label>

                        <input
                           class="form-control"
                           type="text"
                           placeholder="Ingrese el nombre de usuario"
                           name="username"
                           value="{{ old('username', $user->username) }}"
                        >

                        @error('username')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>

                  <div class='col-md-4'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Contraseña</label>

                        <input
                           class="form-control"
                           type="text"
                           placeholder="Ingrese la contraseña"
                           name="password"
                           value="{{ old('password', '') }}"
                        >

                        @error('password')
                           <label class='ms-2 text-danger'>
                              {{ $message }}
                           </label>
                        @enderror
                     </div>
                  </div>

                  <div class='col-md-4'>
                     <div class="form-group">
                        <label class="ms-3 mb-1">Rol</label>

                        <select
                           class="form-control"
                           data-toggle="select"
                           title="Simple select"
                           data-live-search="true"
                           data-live-search-placeholder="Search ..."
                           name="role_id"
                        >
                           @foreach ($roles as $role)
                              <option
                                 value='{{ $role->id }}'
                                 {{ $user->role->id == $role->id ? 'selected' : '' }}
                              >{{ $role->name }}</option>
                           @endforeach
                       </select>

                        @error('role_id')
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
                        >Guardar usuario</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection