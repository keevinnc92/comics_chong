<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\comics;
use App\ListadoComics;
use Session;

class loginController extends BaseController{

public function login(){
  if(Session::has('logeado')){
return redirect()->action('ComicsController@listado');
  }else {
    return view('login/login');
      }
}

public function valida(Request $request){

          $email = $request->input('email');  //recogemos valores
          $password = md5($request->input('password')); //cifrado md5
          $login = DB::table('usuarios')->select('email', 'password')->get();
            //dd($login[0]);
            //valores de la bdd
          $email_bd= $login[0]->email;
          $password_bd= $login[0]->password;

        if ($email==$email_bd && $password==$password_bd) { //comprobamos login
            Session::put('logeado','keevinnc92@gmail.com'); //creamos sesion
            return redirect()->action('ComicsController@listado');
        } else {
          Flash::error("Error, al introducir los datos");
          return redirect()->action('loginController@login');
        }
}


public function logOut(){
  Session::flush(); //destruimos la sesión
return redirect()->action('loginController@login');

}





}
