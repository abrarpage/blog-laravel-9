<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // sekarang bikin user dengan factory
        //buat database untuk usernya
        User::create([
            'name' => 'Usamah Hafidz',
            'username' => 'usamah',
            'email' => 'usamahghoiruhu@gmail.com',
            // buat passwordnya pake bcrypt
            'password' => bcrypt('32018')
        ]);
        
        User::factory(4)->create();
        // User::create([
        //     'name' => 'Falcon',
        //     'email' => 'dedekFalcon@gmail.com',
        //     // buat passwordnya pake bcrypt
        //     'password' => bcrypt('32222')
        // ]);

    // Categorynya dibikin tanpa factory aja

        // buat database 2 category dan seterusnya
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Slicing to HTML',
            'slug' => 'slicing-to-html',
        ]);

        // coba bikin 20 Post
        Post::factory(20)->create();

        // buat database 2 postingan category_id nya 2 dan 1
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur ea sapiente minima dicta eum nihil enim praesentium ab tempore at officiis aut, maxime sed, earum nesciunt. Magnam minima alias, itaque aliquam nihil, natus vel harum non doloremque debitis at architecto quasi ipsum hic dignissimos qui, eius eaque optio consequatur.',
        //     'category_id' => 2,
        //     'user_id' => 2

        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur ea sapiente minima dicta eum nihil enim praesentium ab tempore at officiis aut, maxime sed, earum nesciunt. Magnam minima alias, itaque aliquam nihil, natus vel harum non doloremque debitis at architecto quasi ipsum hic dignissimos qui, eius eaque optio consequatur.',
        //     'category_id' => 1,
        //     'user_id' => 1

        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur ea sapiente minima dicta eum nihil enim praesentium ab tempore at officiis aut, maxime sed, earum nesciunt. Magnam minima alias, itaque aliquam nihil, natus vel harum non doloremque debitis at architecto quasi ipsum hic dignissimos qui, eius eaque optio consequatur.',
        //     'category_id' => 1,
        //     'user_id' => 2

        // ]);


    }
}
