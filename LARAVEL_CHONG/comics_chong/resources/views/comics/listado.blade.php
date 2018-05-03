@extends("layouts.principal")

@section("contenido")

<div class="container">
  @include('flash::message')

<h1>Listado de comics </h1>
      <div class="starter-template" style="overflow-x:auto;">

        <table id="listado_comics" class="order-column" cellspacing="0" width="100%">

          <thead>
          <tr>
            <td>id</td>
            <td>Titulo</td>
            <td>Editorial</td>
            <td>Descripción</td>
            <td>Visible</td>
            <td>Imagen</td>
            <td>Editar</td>
            <td>Eliminar</td>
          </tr>
          </thead>
          @foreach($comicsVista as $comic)
        <tr>
          <td>{{$comic->id}}</td>
          <td>{{$comic->titulo}}</td>
          <td>{{$comic->editorial}}</td>
          <td>{{$comic->descripcion}}</td>
          <td>
            @if($comic->visible)
            <a style="font-weight: bold;color:rgb(110, 200, 69);">Visible</a>
            @else
            <a  style="font-weight: bold;color:rgb(186, 22, 22);">No Visible</a>
            @endif
          </td>

            <!-- <td> <a href="URL::asset('public.html/img/hulk.png')">ver</a></td> -->

              <!--<td> <img src="{{asset('img/hulk.png')}}"></td>
              <img src="img/{{$comic->imagen}}">
              -->
              @if($comic->imagen)
              <td> <a  data-toggle="modal" class="button btn btn-info " href="#{{$comic->id}}" >Ver</a>
              @else
              <td></td>
              @endif


                </td>
          <td><a href="update/{{$comic->id}}" class="button btn btn-primary">Editar</a></td>
          <td><a href="{{url('/delete',$comic->id)}}" onclick="return confirm('Seguro que desea eliminarlo?')" class="button btn btn-danger ">Eliminar</a></td>


        </tr>



        <div id="{{$comic->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img  width="340" height="400" src="img/{{$comic->imagen}}" class="img-responsive">
                </div>
            </div>
          </div>
        </div>





          @endforeach
        </table>
      </div>

    </div>



@endsection
