<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    //Show all post create by specific user
    public function show(){

    }

    //View Create
    public function createPost(){
        return view('create');
    }

    public function store(){
        $date = $this->setDate(request('datePublish'));
        $cbFacebook = $this->setSocialMedia(request('cbFacebook'));
        $cbInstagram = $this->setSocialMedia(request('cbInstagram'));
        $cbTwitter = $this->setSocialMedia(request('cbTwitter'));

       DB::table('posts')->insert([
        'user_id' => Auth::user()->id,
        'title' => request('title'),
        'comment'=> request('comment'),
        'thumbnail'=> request('file'),
        'type_publish_id' => request('type'),
        'Facebook' => $cbFacebook,
        'Instagram' => $cbInstagram,
        'Twitter' => $cbTwitter,
        'date' => $date
        ]);    
        
        return redirect('/')->with('success','Post Created...');
    }

    /**
     * If the date is null, set date now
     */
    public function setDate($date){
        if(empty($date)) {
            date_default_timezone_set('America/Costa_Rica');
            return date('Y-m-d H:i:s');
        }
        else {
            return $date;
        }
    }

    /**
     * Set 1 if user need post
     * Set 0 if user not need post
     */
    public function setSocialMedia($socialMedia){
        $result = "";
        $socialMedia != 1 ?  $result = 0 : $result =  1;
        
        return $result;
    }

    /**
     * 
     */
    public function updatePost(){

    }

    /**
     * 
     */
    public function delete(){

    }

    /**
     * 
     */
    public function arrayData(?Post $post = null)
    {
        $post ??= new Post();
        return array([
            'title' => request('title'),
            'file'=> request('file'),
            'comment'=> request('comment'),
            'type' => request('type'),
            'datePublish' => request('datePublish'),
            'datenow' => request('datenow'),
            'cbFacebook' => request('cbFacebook'),
            'cbInstagram' => request('cbInstagram'),
            'cbTwitter' => request('cbTwitter'),
        ]);
    }
}
