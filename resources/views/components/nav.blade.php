<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
   <div class="container-fluid py-1 px-3">
      <!-- Bread crumbs -->
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
            <li class="breadcrumb-item text-sm">
               <a class="opacity-5 text-white" href="{{ url('/') }}">FarmaPOST</a>
            </li>

            @if (isset($bread))
               @foreach ($bread as $path)
                  <li
                     class="breadcrumb-item text-white"
                     aria-current="page"
                  >
                     <a
                        href='{{ url($path['link']) }}'
                        class="text-sm text-white @if($loop->last) fw-bolder @endif"
                     >{{ $path['text'] }}</a>
                  </li>
               @endforeach
            @else
               <li
                  class="breadcrumb-item text-white"
                  aria-current="page"
               >
                  <a
                     href='#'
                     class="text-sm text-white fw-bolder"
                  >Error 404</a>
               </li>
            @endif
         </ol>

         @if (isset($bread))
            <h6 class="font-weight-bolder text-white mb-0 text-uppercase">{{ $bread[count($bread) - 1]['text'] }}</h6>
         @else
            <h6 class="font-weight-bolder text-white mb-0 text-uppercase">Error 404</h6>
         @endif
      </nav>

      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
         <ul class="ms-md-auto navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
               <form method="POST" action="{{ url('/logout') }}" class="nav-link text-white font-weight-bold px-0" id="logout">
                  @csrf

                  @method('POST')

                  <i class="fa fa-sign-out me-sm-1"></i>

                  <span type="submit" class="d-sm-inline d-none">Cerrar sesión</span>
               </form>
            </li>

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
               <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                     <i class="sidenav-toggler-line bg-white"></i>

                     <i class="sidenav-toggler-line bg-white"></i>

                     <i class="sidenav-toggler-line bg-white"></i>
                  </div>
               </a>
            </li>
         </ul>
      </div>
   </div>
</nav>

<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", () => {
      const logout = document.querySelector('#logout');

      logout.addEventListener('click', () => {
         logout.submit();
      });
   });
</script>