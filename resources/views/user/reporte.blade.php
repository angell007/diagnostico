<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 3%;
            }

            .nav{
                text-align:center;
                background-color: #4FFF33;
                color: #000;
                font-family: 'Times New Roman', Times, serif;
                padding: 1%;
                height: 3rem;


            }
            .left{
                float: left;
            }
            .right{
                float: right;
            }
            .center{
                background:green;
               display:inline-block
            }



            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align : justify;
                justify-content: center;
                padding: 2%;

            }

            .title, {
                font-size: 1rem;
                text-transform: uppercase;

            }

            span, p {
                font-size: 1rem;
                justify-content:center;
            }

            li {
                color: #000;
                font-size: 15px;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .clearfix {
                overflow: auto;
              }
        </style>

</head>

<body>
    <div>

            <div class="nav">
                    <div class="right">
                            <img style="border-radius:50%" src="http://aux.iconspalace.com/uploads/ambulance-icon-256.png" width="50" height="50">
                        </div>
                    <div class="left">
                        <h5 class="title">
                                Diagnósticos.
                            </h5>

                        </div>
                    {{--  <div class="center">
                    Menu
                        </div>  --}}
                    </div>


        <div class="content">
                <div class="clearfix">
                    </div>

                <div class="">
                  <div class="">

                        <div class="">
                                <h3 class="">
                                    Información del usuario
                                </h3>
                                <div class="">
                                  <ul class="">
                                    <li class="">
                                        Nombre
                                      <span class=""> {{Auth::user()->name}}</span>
                                    </li>
                                    <li class="">
                                      Age
                                      <span class="">{{Auth::user()->edad}}</span>
                                    </li>
                                    <li class="">
                                      ID
                                      <span class="">{{Auth::user()->identificacion}}</span>
                                    </li>

                                    <li class="">Fecha de impresión :
                                    <small>{{\Carbon\carbon::now()}}</small>
                                    </li>

                                  </ul>
                                </div>
                              </div>

                  </div>
                  <div class="col-md-7 m-3">

                        <h5 class="">Enfermedad : {{$enfermedad->name}}</h5>
                        <p class="">{{$enfermedad->descripcion}}</p>
                        <h5 class="">Sintomas</h5>
                        <ul class="mb-3">
                                @foreach ($enfermedad->sintomas as $item)
                                <li class="tr">
                                    <span class="">
                                        {{$item->name}}
                                    </span>
                                </li>
                                @if($item->descripcion)
                                <h6 class="">Consiste en : </h6>
                                <span class="">
                                    {{$item->descripcion}}
                                </span>
                                @endif
                                @endforeach
                            </ul>
                            <h5 class=""> Tratamientos</h5>
                            <ul class="mb-3">
                                @foreach ($enfermedad->tratamientos as $item)
                                <li>
                                    <span class="">
                                        {{$item->name}}
                                    </span>
                                </li>
                                @if($item->descripcion)
                                <h6 class="">Consiste en : </h6>
                                <span class="">
                                    {{$item->descripcion}}
                                </span>
                                @endif
                                @endforeach
                            </ul>

                  </div>
                </div>
        </div>
    </div>
</body>
</html>
