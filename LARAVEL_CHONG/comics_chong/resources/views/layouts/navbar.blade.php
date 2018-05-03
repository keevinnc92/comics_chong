<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{action('ComicsController@listado')}}">Administración<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{action('TiendaController@listado')}}">Tienda<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{action('ComicsController@create')}}">Añadir<span class="sr-only">(current)</span></a>
      </li>
@if(session()->has('logeado'))
<a class="nav-link"style="text-align:center;">  Usuario:  {{ Session::get('logeado')}}</a>
@endif
    </ul><a href="logout" href="{{action('loginController@logout')}}" class="button btn btn-danger navbar-btn">Log out</a>

  </div>
</nav>
