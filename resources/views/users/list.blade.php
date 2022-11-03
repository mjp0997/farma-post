@extends('layouts.dashboard')

@section('content')
   @if (session('deleted'))
      <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
         <div id="liveToast" class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true" style="overflow: hidden;">
            <div class="toast-header align-items-center py-1">
               <strong class="me-auto">Usuario eliminado</strong>

               <button type="button" class="btn-close text-dark h4 mb-0" style="line-height: 80%" data-bs-dismiss="toast" aria-label="Close">
                  <i class="ni ni-fat-remove"></i>
               </button>
            </div>

            <div class="toast-body">
               <p class="text-center mb-0"><small class="text-dark">{{ session('deleted') }}</small></p>
            </div>
         </div>
      </div>
   @endif

   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-header pb-0 p-3">
               <div class='row align-items-center'>
                  <div class='col-md-6 mb-2 mb-md-0'>
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-0">Listado de usuarios</h6>
                     </div>
                  </div>

                  <div class="col-md-6 mb-2 mb-md-0 text-end">
                     <a
                        class="btn btn-sm bg-primary text-white mb-0"
                        href="{{ url('/users/create') }}"
                     >
                        <i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Nuevo usuario
                     </a>
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
                              <p class="m-0 fw-bold text-primary text-xs">Nombre:</p>
                           </div>
                        </th>

                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs">Rol:</p>
                           </div>
                        </th>

                        <th>
                           <div class="text-center">
                              <p class="m-0 fw-bold text-primary text-xs">Usuario:</p>
                           </div>
                        </th>

                        <th></th>
                     </tr>
                  </thead>

                  <tbody>
                     @foreach ($users as $user)
                        <tr>
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $user->id }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $user->name }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $user->role->name }}</p>
                              </div>
                           </td>
                           
                           <td>
                              <div class="text-center">
                                 <p class="m-0">{{ $user->username }}</p>
                              </div>
                           </td>

                           <td>
                              <div class='text-center'>
                                 <a
                                    href='{{ url('/users/'.$user->id) }}'
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

               {{-- <div class='row mt-3'>
                  <div class='col'>
                     <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                 <i class="fa fa-angle-left"></i>

                                 <span class="sr-only">Previous</span>
                              </a>
                           </li>
                           
                           <li class="page-item"><a class="page-link" href="#">1</a></li>

                           <li class="page-item"><a class="page-link" href="#">2</a></li>

                           <li class="page-item"><a class="page-link" href="#">3</a></li>

                           <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                 <i class="fa fa-angle-right"></i>

                                 <span class="sr-only">Next</span>
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </div>
               </div> --}}

            </div>
            {{ $users->links() }}
         </div>
      </div>
   </div>
@endsection