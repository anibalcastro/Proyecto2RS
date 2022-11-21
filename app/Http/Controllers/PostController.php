<?php

namespace App\Http\Controllers;
use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    /**
     *
     */
    public function index(){
        $posts = $this->getPostByUserId();
        return View::make('home')->with('posts', $posts);
    }

    /**
     * $id-> Identificador de la publicacion que se muestre la informacion
     * return -> Vista con su respectivo arreglo con la informacion.
     */
    public function postInformation($id){
        return View::make('card-post')->with('post', Post::find($id));
    }

    /**
     * return -> todos los post del usuario autenticado.
     */
    public function getPostByUserId(){
        if (Auth::user()){
            return Post::where('user_id', Auth::user()->id)->paginate(8);
        }
    }

    /**
     * return -> vista de crear un nuevo post.
     */
    public function createPost(){
        return view('create');
    }

    /**
     * $request -> Contiene todos los atributos de un post que desea ser creado.
     * return -> una vista.
     */
    public function store(Request $request){
        $date = $this->setDate($request->datePublish, $request->type);
        $cbFacebook = $this->setSocialMedia($request->cbFacebook);
        $cbInstagram = $this->setSocialMedia($request->cbInstagram);
        $cbTwitter = $this->setSocialMedia($request->cbTwitter);

       DB::table('posts')->insert([
        'user_id' => Auth::user()->id,
        'title' => $request->title,
        'comment'=> $request->comment,
        'thumbnail' => request()->file('file')->store('public/thumbnails'),
        'type_publish_id' => $request->type,
        'Facebook' => $cbFacebook,
        'Instagram' => $cbInstagram,
        'Twitter' => $cbTwitter,
        'date' => $date
        ]);


        session()->flash('success', 'The post has been created');
        return redirect('/');
    }

    /**
     * $date -> recibe una fecha.
     * $type -> recibe el tipo de como desea que se publique el post (Directo(1) / En Cola(2) / Programada(3))
     * return -> retorna un formato de fecha 'Y-m-d H:i:s'
     */
    public function setDate($date, $type){
        if(empty($date) || $type == 1 || $type == 2) {
            date_default_timezone_set('America/Costa_Rica');
            return date('Y-m-d H:i:s');
        }
        else {
            return $date;
        }
    }

    /**
     * $socialMedia -> recibe si fue seleccionado con el numero 1,
     * si recibe un null, se convierte en un 0
     */
    public function setSocialMedia($socialMedia){
        $result = "";
        $socialMedia != 1 ?  $result = 0 : $result =  1;

        return $result;
    }

    /**
     * $id -> Identificador del post
     * return -> Retorna la vista con los datos respectivos del post
     */
    public function updateView($id){
        $post = Post::find($id);
        return View::make('edit-post')->with('post', $post);
    }

    /**
     * $request -> Recibe todos los datos introducidos por el usuario.
     * $id -> Identificador del post que se desea editar.
     */
    public function update(Request $request, $id){
        $date = $this->setDate(request('datePublish'), request('type'));
        $cbFacebook = $this->setSocialMedia(request('cbFacebook'));
        $cbInstagram = $this->setSocialMedia(request('cbInstagram'));
        $cbTwitter = $this->setSocialMedia(request('cbTwitter'));

        Post::where('id',$id)->update([
            'comment'=> $request->comment,
            'type_publish_id' =>$request->type,
            'date'=> $date,
            'Facebook'=> $cbFacebook,
            'Instagram'=>$cbInstagram,
            'Twitter'=>  $cbTwitter
        ]);
        Session::flash('success', 'The post has been update');
        return redirect('/');
    }

    /**
     * $id -> Identificador del post que se desea eliminar
     */
    public function delete($id){
        Post::where('id', $id)->delete();
        session()->flash('success','The post has been delete');

        return redirect('/');
    }
}
