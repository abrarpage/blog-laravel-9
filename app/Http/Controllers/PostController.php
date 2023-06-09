<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// panggil dari Model Post nya
use \App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        // untuk mengetahui apa yang diketik
        // dd(request('search'));
        // $posts = Post::latest();
        // if (request('search')){
        //     $posts->where('title','like', '%' . request('search') . '%')
        //     ->orWhere('body','like', '%' . request('search') . '%');            
        // }
        $title='';
        if(request('category')){
            $category = Category::firstWhere('slug',request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username',request('author'));
            $title = ' by '  .  $author->name;
        }


        return view ('posts',
        [
            "title" => "All Posts"  .  $title,
            "active" => 'posts',
            // buat method harus dengan ::
            // karena mengambil class Post maka harus ditulis
            // "posts" => Post::all()
            // mengambil yang terbaru 
            // "posts" => Post::latest()->get()
            // dikasih filter untuk filterisasinya buat pencariannya
            "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
            // "posts" => $posts->get()

        ]);
    }

    // public function show ($slug){
    //     return view ('post',
    //     [
    //         "title" => "Single Post",
    //         "post" => Post::find($slug)
    //     ]);
    // }

    // coba ngambil idnya
    // public function show ($id){
    //     return view ('post',
    //     [
    //         "title" => "Single Post",
    //         "post" => Post::find($id)
    //     ]);
    // }

    // ngambil dari web php
    public function show (Post $post){
        return view ('post',
        [
            "title" => "Single Post",
            "active" => 'posts',

            // yang dikirim $post tidak perlu query
            "post" => $post
        ]);
        // memungkinkan mengurutkan tidak sesuai id
    }
}
