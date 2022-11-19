<!DOCTYPE html>
<html lang="en">

@include('components.head')

<main class="main-content mt-0 ps">
   <section>
     <div class="page-header min-vh-100">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column justify-content-center mx-lg-0 mx-auto">
                  <div class="card card-plain">
                     <div class="card-header pb-0 text-start">
                        <h4 class="font-weight-bolder">Iniciar Sesión</h4>

                        <p class="mb-0">Ingrese su usuario y contraseña para acceder al sistema</p>
                     </div>

                     <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                           @csrf

                           @method('POST')
                           
                           <div class="mb-3">
                              <input
                                 type="text"
                                 class="form-control form-control-lg"
                                 placeholder="Usuario"
                                 aria-label="Username"
                                 name='username'
                                 value={{ old('username', '') }}
                              >
                              
                              @error('username')
                                 <label class='ms-2 text-danger'>
                                    {{ $message }}
                                 </label>
                              @enderror

                              @error('auth')
                                 <label class='ms-2 mb-0 text-danger'>
                                    {{ $message }}
                                 </label>
                              @enderror
                           </div>

                           <div class="mb-3">
                              <input
                                 type="password"
                                 class="form-control form-control-lg"
                                 placeholder="Password"
                                 aria-label="Password"
                                 name="password"
                              >
                              
                              @error('password')
                                 <label class='ms-2 mb-0 text-danger'>
                                    {{ $message }}
                                 </label>
                              @enderror
                           </div>

                           <div class="form-check form-switch">
                              <input
                                 class="form-check-input"
                                 type="checkbox"
                                 id="rememberMe"
                                 name="remember"
                                 {{ (!empty(old('remember')) ? 'checked' : '') }}
                              >

                              <label class="form-check-label" for="rememberMe">Mantener sesión iniciada</label>
                           </div>



                           <div class="text-center">
                              <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Iniciar sesión</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>

               <div class="col-6 d-lg-flex d-none justify-content-center align-items-center flex-column">
                  <div style="width: 50%">
                     <img src='{{ asset('/logo.png') }}' alt='logo' style="width: 100%">
                  </div>
               </div>
            </div>                              
         </div>
     </div>
   </section>
 <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></main>

</html>