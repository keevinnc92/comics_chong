@extends("layouts.principal")

@section("contenido")

<div class="container">
<h1>Editar comic </h1>
<div class="container">
  <form method="POST" action="http://localhost/LARAVEL_CHONG/comics_chong/public/store_update" accept-charset="UTF-8" enctype="multipart/form-data">
  <input hidden type="text" class="form-control" name="id" id="id" value="{{$comic->id}}">

  <div class="form-group">
    <label for="formGroupExampleInput">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Introduzca titulo" value="{{$comic->titulo}}">
  </div>
  <div class="form-group">
    <label for="txt_editorial">Editorial</label>
    <input type="text" class="form-control" id="editorial" name="editorial" value="{{$comic->editorial}}" placeholder="Introduzca editorial">
  </div>
  <div class="form-group">
    <label for="txt_descripcion">Descripción </label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$comic->descripcion}}" placeholder="Introduzca descripción">
  </div>
  <div class="form-group">
  <label for="txt_estado">Estado</label>
  <select class="form-control" id="visible" name="visible">
     @if($comic->visible)
    <option value="1"  selected="selected">Visible</option>
    <option value="0" >Oculto</option>
    @else
    <option value="1" >Visible</option>
    <option value="0"  selected="selected">Oculto</option>
     @endif


  </select>
</div>

@if($comic->imagen)
<div class="form-group">
  <input hidden type="text" class="form-control" name="imagen" id="imagen" value="no_modificar">
  <img src="../img/{{$comic->imagen}}" alt="imagen" width="10%" >
  <a href="{{url('/delete_img',$comic->id)}}" onclick="return confirm('Seguro que desea eliminarlo?')" style="font-weight: bold;color:rgb(181, 0, 0);">X</a>
</div>
@else
<div class="form-group">
  <label for="txt_imagen">Imagen:</label>
  <input type="file" class="form-control-file" accept="image/*" id="imagen" name="imagen" aria-describedby="imagen">
  <small id="txt_mensaje_imagen" class="form-text text-muted">Seleccione una imagen.</small>
</div>
@endif


<input type="hidden" name="_token" value="{{ csrf_token() }}">
<button type="submit" class="btn btn-primary">Modificar</button>

</form>
</div>


    </div>



@endsection
