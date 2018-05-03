@extends("layouts.principal")

@section("contenido")

<div class="container">
<h1>Agregar de comic </h1>
  <form method="POST" action="http://localhost/LARAVEL_CHONG/comics_chong/public/store" accept-charset="UTF-8" enctype="multipart/form-data">

  <div class="form-group">
    <label for="formGroupExampleInput">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Introduzca titulo"  required>
  </div>
  <div class="form-group">
    <label for="txt_editorial">Editorial</label>
    <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Introduzca editorial"  required>
  </div>
  <div class="form-group">
    <label for="txt_descripcion">Descripción </label>
    <input class="form-control" name="descripcion" id="descripcion" placeholder="Introduzca descripción"  required>
  </div>
  <div class="form-group">
  <label for="txt_estado">Estado</label>
  <select name="visible" class="form-control" id="visible">
    <option value="1">Visible</option>
    <option value="0">Oculto</option>
  </select>
</div>


<div class="form-group">
  <label for="txt_imagen">Imagen:</label>
  <input type="file" class="form-control-file" accept="image/*" name="imagen" id="imagen" aria-describedby="imagen" required>
  <small id="txt_mensaje_imagen" class="form-text text-muted">Seleccione una imagen.</small>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<button type="submit" class="btn btn-primary">Añadir</button>



</form>
</div>
@endsection
