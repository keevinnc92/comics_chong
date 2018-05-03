<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style media="screen">
/*    --------------------------------------------------
:: Formulario login
-------------------------------------------------- */
#login {
  padding-top: 50px
}
#login .form-wrap {
  width: 30%;
  margin: 0 auto;
}
#login h1 {
  color: #1fa67b;
  font-size: 18px;
  text-align: center;
  font-weight: bold;
  padding-bottom: 20px;
}
#login .form-group {
  margin-bottom: 25px;
}
#login .checkbox {
  margin-bottom: 20px;
  position: relative;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}
#login .checkbox.show:before {
  content: '\e013';
  color: #1fa67b;
  font-size: 17px;
  margin: 1px 0 0 3px;
  position: absolute;
  pointer-events: none;
  font-family: 'Glyphicons Halflings';
}
#login .checkbox .character-checkbox {
  width: 25px;
  height: 25px;
  cursor: pointer;
  border-radius: 3px;
  border: 1px solid #ccc;
  vertical-align: middle;
  display: inline-block;
}
#login .checkbox .label {
  color: #6d6d6d;
  font-size: 13px;
  font-weight: normal;
}
#login .btn.btn-custom {
  font-size: 14px;
margin-bottom: 20px;
}
#login .forget {
  font-size: 13px;
text-align: center;
display: block;
}

/*    --------------------------------------------------
:: Inputs & botones
-------------------------------------------------- */
.form-control {
  color: #212121;
}
.btn-custom {
  color: #fff;
background-color: #1fa67b;
}
.btn-custom:hover,
.btn-custom:focus {
  color: #fff;
}

</style>


<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Introduce tus datos:</h1>
                @include('flash::message')
                    <form role="form" action="http://localhost/LARAVEL_CHONG/comics_chong/public/valida" method="post" id="login-form" >
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Introduzca email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Introduzca password">
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">

                    </form>
                    <hr>
        	    </div>
    		</div>
    	</div>
    </div>
</section>





<script type="text/javascript">
function showPassword() {

  var key_attr = $('#password').attr('type');

  if(key_attr != 'text') {

      $('.checkbox').addClass('show');
      $('#password').attr('type', 'text');

  } else {

      $('.checkbox').removeClass('show');
      $('#password').attr('type', 'password');

  }

}
</script>
