<?php

// use App\Models\Post;
// use App\Models\User;
// ditulis ya kita ngambil dari mana modelnya
// use App\Models\Post;

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
    // carilah sebuah file namanya welcome, meski nggk sama persis tp bisa
// });

Route::get('/', function () {
    
    return view('home',[
        // return brupa array assosiatif
        "title" => "Home",
        "active" => 'home'
    ]);
  
});

Route::get('/about', function () {
    return view('about',
    //ini mengirimkan array asosiatif ke parameter about 
    // [
        // "name" => "Usamah Hafidz",
        // "status" => "Joki sampe Mythic",
        // "gambar" => "usamah.jpg"
    // ],[
    //     "title" => "About",
    //     "active" => 'home'

    // ]);
    [
"title" => "About",
"active" => "about",
"name" => "Usamah Hafidz",
"status" => "Joki sampe Mythic",
"gambar" => "usamah.jpg"

]
    );
  
});



Route::get('/blog',[PostController::class, 'index']); 

// function () {
    // membuat databese tiruan
    // $blog_posts =[
    //     [
    //         "title" => "Judul Post Pertama",
    //         "slug" => "judul-post-pertama",
    //         "author" => "Usamah Hafidz",
    //         "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, mollitia quod saepe laudantium inventore quaerat enim deserunt officia, neque illum odit veritatis iusto et? Quam doloribus ipsa odit error enim at veniam incidunt, corporis assumenda molestiae deleniti! Suscipit iusto tempore asperiores accusamus exercitationem temporibus corrupti cumque fugiat fuga praesentium voluptates aperiam earum consequuntur placeat, nostrum vel nisi dicta quas corporis eum sit neque, magni quaerat. Cum velit expedita architecto, assumenda error pariatur, qui sint commodi, voluptates nemo est nam non."
    //     ],
    //     [
    //         "title" => "Judul Post Kedua",
    //         "slug" => "judul-post-kedua",
    //         "author" => "Falcon 18",
    //         "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos necessitatibus, quo facere nulla hic odit facilis eligendi amet, iste cum, modi fuga accusamus laborum. Natus quas non sequi at optio inventore debitis aspernatur, eius maxime dignissimos, ipsa sapiente reprehenderit dolor minima, quidem praesentium voluptates voluptas saepe. Soluta officiis, reprehenderit molestias sed esse, voluptatibus beatae tempora fuga fugit, quod ab ex voluptatum cum exercitationem odio placeat? Deserunt est numquam molestiae qui doloremque aliquid soluta officiis eligendi ipsa suscipit rem, repudiandae assumenda facilis hic magnam, quisquam accusantium praesentium quod laborum dicta minima! Nesciunt sequi excepturi deserunt, tempore assumenda nihil dolores ex ea."
    //     ]
    //     ];
    // return view('posts'
    // ,[
        // "title" => "Posts",
        // buat method harus dengan ::
        // karena mengambil class Post maka harus ditulis
        // "posts" => Post::all()
        // ]
// );
  
// });

// halaman single post single
// untuk dapetin slugnya pake kurung kurawal, ini disebut juga wildcard
// Route:: get('blog/{slug}',[PostController::class, 'show'] );
//  function($slug){
    // var_dump($slug);
    // parameter $slug berisi link yang kita pilih
    // $blog_posts =[
    //     [
    //         "title" => "Judul Post Pertama",
    //         "slug" => "judul-post-pertama",
    //         "author" => "Usamah Hafidz",
    //         "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, mollitia quod saepe laudantium inventore quaerat enim deserunt officia, neque illum odit veritatis iusto et? Quam doloribus ipsa odit error enim at veniam incidunt, corporis assumenda molestiae deleniti! Suscipit iusto tempore asperiores accusamus exercitationem temporibus corrupti cumque fugiat fuga praesentium voluptates aperiam earum consequuntur placeat, nostrum vel nisi dicta quas corporis eum sit neque, magni quaerat. Cum velit expedita architecto, assumenda error pariatur, qui sint commodi, voluptates nemo est nam non."
    //     ],
    //     [
    //         "title" => "Judul Post Kedua",
    //         "slug" => "judul-post-kedua",
    //         "author" => "Falcon 18",
    //         "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos necessitatibus, quo facere nulla hic odit facilis eligendi amet, iste cum, modi fuga accusamus laborum. Natus quas non sequi at optio inventore debitis aspernatur, eius maxime dignissimos, ipsa sapiente reprehenderit dolor minima, quidem praesentium voluptates voluptas saepe. Soluta officiis, reprehenderit molestias sed esse, voluptatibus beatae tempora fuga fugit, quod ab ex voluptatum cum exercitationem odio placeat? Deserunt est numquam molestiae qui doloremque aliquid soluta officiis eligendi ipsa suscipit rem, repudiandae assumenda facilis hic magnam, quisquam accusantium praesentium quod laborum dicta minima! Nesciunt sequi excepturi deserunt, tempore assumenda nihil dolores ex ea."
    //     ]
    //     ];
        // di map
// $newpost=[];
//         foreach ($blog_posts as $post) {
//             if ($post["slug"] === $slug) {
//                $newpost = $post;
//             }
//         }
    // return view('post'
    // ,[
        // "title" => "Single Post",
        // hasil map dimasukin ke "post
        // "post" => $newpost
        // "post" => Post::find($slug)
    // ]
// );

// })

// bikin route categories
Route::get('/categories', function(){
    return view('/categories',[
        'title' =>'Post Categories',
    'active' => 'categories',
        'categories' =>Category::all()
    ]);
});
// skarang pakenya post,dikirim {post} lalu ditangkap oleh controller
Route:: get('/blog/{post:slug}',[PostController::class, 'show'] );

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view ('category',[
//     'title'=>$category->name,
//     'posts' => $category->posts,
//     'category' => $category->name]);
// });

Route::get('/categories/{category:slug}', function(Category $category){
    return view ('posts',[ 
    'title'=> "Post By Category : $category->name",
    'active' => 'categories',
    'posts' => $category->posts->load('category','author')
    // 'category' => $category->name
]);
});

// buat halaman login
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);



Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);



// Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

Route::get('/dashboard', function() {
   return view('dashboard.index'); 
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// except, supaya tidak bisa diakses
// dikasih auth supaya tidak bisa diakses kalau blm login
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/post/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');





// Route::get('/authors/{author:username}', function(User $author){
//     return view ('posts',[
//     'title'=>'User Posts',
//     'posts' => $author->posts]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view ('posts',[
//     'title'=>"Post By Author : $author->name",
//     'active' => 'posts',
//     'posts' => $author->posts->load('category','author')]);
// });