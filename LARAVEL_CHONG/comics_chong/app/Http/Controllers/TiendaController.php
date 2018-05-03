<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\ListadoComics;
use Illuminate\Support\Facades\DB;
// use App\comics;
use Laracasts\Flash\Flash;
// use Intervention\Image\ImageManager;
// use Illuminate\Support\Facades\Storage;
// use Image;
use Session;


class TiendaController extends Controller
{


    public function listado(){
        //$comics=ListadoComics::all();
          if(Session::has('logeado')){
            $comics=DB::table('comics')->get();
            return view("comics/tienda",array('comicsVista'=>$comics));
            //return view('login/login');
          }else {
            return view('login/login');
              }
      }

      public function comprar($id){
            echo "añadido al carrito".$id;
            //$comic=DB::table('comics')->where('id',$id)->get();
            //return view("comics/update",['comic'=>$comic[0]]);
      }


      public function store(Request $request){
        //creamos el comic en la bdd
        $comic = comics::create(
             ['titulo' => $request['titulo'],
                 'editorial' => $request['editorial'],
                 'descripcion' => $request['descripcion'],
                 'visible' => $request['visible'],
                 'imagen'  => $request['imagen']->getClientOriginalName(),
             ]);

        // Movemos la Img al servidor
            $nombre=$request->file('imagen')->getClientOriginalName();
            $img = Image::make($_FILES['imagen']['tmp_name']);
            $img->save('img/'.$nombre);

        //mostramos mensaje y redirigimos
             if($comic->save()){
                Flash::success("Se ha añadido el comic correctamente");
              }else {
                Flash::error("Error, añadiendo el comic");
               }
              return redirect()->action('ComicsController@listado');
      }








}
