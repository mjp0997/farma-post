<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body class="g-sidenav-show bg-gray-100">
   <div class="min-height-300 bg-primary position-absolute w-100"></div>

   @include('components.sidebar')

   <main class="main-content position-relative border-radius-lg">
      @include('components.nav')

      <div class="container-fluid py-4">
         @yield('content')         
      </div>
   </main>
   
   @include('components.footer')
</body>

</html>