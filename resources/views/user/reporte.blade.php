<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>


        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        .contenido {
            font-size: 20px;
        }

        #primero {
            background-color: #ccc;
        }

        #segundo {
            color: #44a359;
        }

        #tercero {
            text-decoration: line-through;
        }
    </style>
</head>

<body id="body">
    <h1>
        <p>{{$today}}</p>
    </h1>
    <hr>
    <div class="contenido">
        <div class="row align-items-center mb-3 ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- <div class="card mb-3">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                          </div> --}}
                          {{-- <div class="card"> --}}
                                {{-- <div class="card-body"> --}}
                                        <h5 class="card-title">{{$enfermedad->name}}</h5>
                                        <p class="card-text">{{$enfermedad->descripcion}}</p>
                                        @foreach ($enfermedad->sintomas as $item)
                                        <span class="card-text" >
                                            {{$item->name}}
                                          </span>
                                          <br>
                                          <br>
                                          <span class="card-text" >
                                                  {{$item->descripcion}}
                                                </span>
                                          @endforeach
                                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                      {{-- </div> --}}
                                    {{-- </div> --}}

                            {{-- <img src="..." class="card-img-top" alt="..."> --}}
                          </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <p id="segundo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem
        voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati
        quisquam minus modi.</p>
    </div> --}}
</body>

</html>
