<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
   <div>
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

      <a class="navbar-brand d-flex flex-column align-items-center m-0" href="{{ url('/') }}">
         <p class="farma-font h3 m-0">Farma</p>

         <p class="post-font h2 m-0 text-primary">POST</p>
      </a>
   </div>

   <hr class="horizontal dark mt-0">
   
   <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a
               class="nav-link {{ request()->is('/') ? 'active' : '' }}"
               href="{{ url('/') }}"
            >
               <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-chart-pie-35 text-primary text-sm opacity-10"></i>
               </div>
               
               <span class="nav-link-text ms-1">Inicio</span>
            </a>
         </li>

         <li class="nav-item">
            <a
               class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
               href="{{ url('/products') }}"
            >
               <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-app text-success text-sm opacity-10"></i>
               </div>
               
               <span class="nav-link-text ms-1">Productos</span>
            </a>
         </li>
      </ul>
   </div>
</aside>