@extends("layouts.principal")

@section("contenido")

<div class="container">
  @include('flash::message')

<h1>Listado de comics </h1>
      <div class="starter-template" style="overflow-x:auto;">
        @foreach($comicsVista->chunk(3) as $twocomic)
            <div class="row">
            @foreach ($twocomic as $comic)

                    @if(isset($comic->visible))
                    <div class="col-sm" style="padding-top: 50px;">
                      <div class="card" style="width: 16rem;text-align:center;border-radius: 25px; border: 2px solid grey;">
                          @if($comic->imagen)
                            <img class="card-img-top" src="../public/img/{{$comic->imagen}}" style="border-radius: 25px;" alt="cabecera">
                          @else
                            <img class="card-img-top" src="../public/img/comic.jpg" style="border-radius: 25px;" alt="Card image cap">
                          @endif
                        <div class="card-body">
                          <h5 class="card-title">{{$comic->titulo}}</h5>
                          <p class="card-text">{{$comic->descripcion}}</p>
                          <a href="#" class="btn btn-success">Comprar</a>
                        </div>
                      </div>
                    </div>
                    @endif

@endforeach

            </div>
        @endforeach

    </div>



@endsection
