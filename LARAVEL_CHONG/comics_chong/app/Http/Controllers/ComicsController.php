<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListadoComics;
use Illuminate\Support\Facades\DB;
use App\comics;
use Laracasts\Flash\Flash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Image;
use Session;


class ComicsController extends Controller
{
    public function index(){
      return redirect()->action('ComicsController@listado');
    }

    public function create(){
       if(Session::has('logeado')){
         return view("comics/create");
       }else{
       return redirect()->action('loginController@login');
     }
   }

    public function listado(){
        //$comics=ListadoComics::all();
          if(Session::has('logeado')){
            $comics=DB::table('comics')->get();
            return view("comics/listado",array('comicsVista'=>$comics));
            return view('login/login');
          }else {
            return view('login/login');
              }
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


        public function delete($id){

            $comic=DB::table('comics')->where('id',$id)->get();
            $name_img= $comic[0]->imagen;
            $resultado=DB::table('comics')->where('id', '=', $id)->delete();
            $borrado=Storage::delete('img/'.$name_img);
            if($borrado){
                Flash::success("Se ha borrado el comic correctamente");
            }else{
              Flash::error("Error, borrando el comic");
            }
            return redirect()->action('ComicsController@listado');
        }




        public function delete_img($id){
          // return $id;
          $comic=DB::table('comics')->where('id',$id)->get();
           $name_img= $comic[0]->imagen;
           DB::table('comics')
            ->where('id', $id)
            ->update(['imagen' => ""]);
          Storage::delete('img/'.$name_img);
           return redirect()->action('ComicsController@update',$id);
        }


    public function update($id){
          $comic=DB::table('comics')->where('id',$id)->get();
          return view("comics/update",['comic'=>$comic[0]]);
    }

  public function store_update(Request $request){

    if ($request['imagen']=="no_modificar") {// ya estaba la imagen

      $modificado=DB::table('comics')->whereIn('id', [$request['id']])->update(
        [
          'titulo' => $request['titulo'],
          'editorial' => $request['editorial'],
          'descripcion' => $request['descripcion'],
          'visible' => $request['visible']
        ]
      );
      Flash::success("Se ha modificado el comic correctamente");
      return redirect()->action('ComicsController@listado');

    }  else if($request['imagen'] && $request['imagen']!="no_modificar"){// nueva image

        $nombre=$request->file('imagen')->getClientOriginalName();
          // Movemos la Img al servidor
        $img = Image::make($_FILES['imagen']['tmp_name']);
        $img->save('img/'.$nombre);
    }else if(!$request['imagen'] ) {  // no hay imagen

      $nombre="";
    }

        $modificado=DB::table('comics')->whereIn('id', [$request['id']])->update(
          [
            'titulo' => $request['titulo'],
            'editorial' => $request['editorial'],
            'descripcion' => $request['descripcion'],
            'visible' => $request['visible'],
            'imagen' => $nombre
          ]
        );
          Flash::success("Se ha modificado el comic correctamente");
          return redirect()->action('ComicsController@listado');



  }
  // Fin PENDIENTE****





}
