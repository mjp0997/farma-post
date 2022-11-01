<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
   <div class="container-fluid py-1 px-3">
      <!-- Bread crumbs -->
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">FarmaPOST</a></li>

            @foreach ($bread as $path)
               <li
                  class="breadcrumb-item text-sm text-white"
                  aria-current="page"
               >
                  <a
                     href='{{ url($path['link']) }}'
                     class="text-sm text-white @if($loop->last) active @endif"
                  >{{ $path['text'] }}</a>
               </li>
            @endforeach
         </ol>

         <h6 class="font-weight-bolder text-white mb-0 text-uppercase">{{ $bread[count($bread) - 1]['text'] }}</h6>
      </nav>

      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
         <ul class="ms-md-auto navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
               <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-sign-out me-sm-1"></i>

                  <span class="d-sm-inline d-none">Cerrar sesión</span>
               </a>
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

            <li class="nav-item px-3 d-flex align-items-center">
               <a href="javascript:;" class="nav-link text-white p-0">
                  <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
               </a>
            </li>
         </ul>
      </div>
   </div>
</nav>