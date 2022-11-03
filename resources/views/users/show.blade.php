@extends('layouts.dashboard')

@section('content')
   <div class='row'>
      <div class='col-md-7 mx-auto'>
         <div class='card'>
            <div class='card-header p-3'>
               <h6 class="mb-0">Usuario #{{ $user->id }}</h6>
            </div>

            <div class='card-body'>
               <div class='row'>
                  <div class='col'>
                     <span class="text-xs fw-bolder text-dark">Nombre:</span>

                     <p class="fw-bold">{{ $user->name }}</p>
                  </div>
               </div>

               <div class='row'>
                  <div class='col-md'>
                     <span class='text-xs fw-bolder text-dark'>Usuario:</span>

                     <p class='fw-bold'>{{ $user->username }}</p>
                  </div>

                  <div class='col-md'>
                     <span class='text-xs fw-bolder text-dark'>Rol:</span>

                     <p class='fw-bold'>{{ $user->role->name }}</p>
                  </div>
               </div>

               <div class='row mt-4'>
                  <div class='col'>
                     <form
                        class='d-flex justify-content-end gap-3'
                        method="POST"
                        action="{{ url('users/'.$user->id) }}"
                     >
                        @csrf
                        
                        @method('DELETE')

                        <button
                           type="submit"
                           class="btn btn-danger mb-0"
                        >Eliminar</button>

                        <a
                           href='{{ url('users/'.$user->id.'/edit') }}'
                           class="btn btn-warning mb-0"
                        >Editar</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection