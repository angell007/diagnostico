<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:regular,bold">  --}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fa.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/laracrud.css') }}">
    {{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}">  --}}

    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body class="h-100">
    @yield('parent-content')
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/datatables.min.js') }}"></script>
    <script src="{{ asset('/js/laracrud.js') }}"></script>
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
    @stack('scripts')

<script>
        jQuery(document).ready(function(){
            $(".oculto").hide();
              $(".inf").click(function(){
                    var nodo = $(this).attr("href");

                    if ($(nodo).is(":visible")){
                         $(nodo).hide();
                         return false;
                    }else{
                  $(".oculto").hide("slow");
                  $(nodo).fadeToggle("fast");
                  return false;
                    }
              });
          });

    {{--  enviando = false; //Obligaremos a entrar el if en el primer submit
    btn = document.getElementById("btn")
    function checkSubmit() {
        if (!enviando) {
            enviando= true;
            btn.disabled=true;
    		return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("El formulario ya se esta enviando");
            return false;
        }
    }  --}}

</script>

</body>
</html>
