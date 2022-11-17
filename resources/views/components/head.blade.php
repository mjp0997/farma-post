<head>
   <meta charset="utf-8" />

   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
   <meta name="products-uri" id="products-uri" content="{{ url('/api/products') }}" />
   
   <link rel="icon" type="image/png" href="{{ asset('/logo.png') }}">

   <title>Argon Dashboard 2 by Creative Tim</title>

   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <!-- Nucleo Icons -->
   <link href="{{ asset('/css/nucleo-icons.css') }}" rel="stylesheet" />
   <link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- CSS Files -->
   <link id="pagestyle" href="{{ asset('/css/argon-dashboard.min.css?v=2.0.4') }}" rel="stylesheet" />
   {{-- Custom css files --}}
   <link href="{{ asset('/css/index.css') }}" rel="stylesheet" />
</head>