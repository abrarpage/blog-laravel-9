<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    // fillable berarti yg boleh diisi
    // protected $fillable = ['title','excerpt','body'];
    // guarded berarti yg tidak boleh diisi hanya
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false){
        return $query->where('title','like', '%' . $filters['search'] . '%')
            ->orWhere('body','like', '%' . $filters['search'] . '%');            
        }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('body', 'like', '%' . $search . '%');
             });
         });

         $query->when($filters['category'] ?? false, function($query, $category){
             return $query->whereHas('category', function($query) use ($category){
                 $query->where('slug',$category);
             }); 
         });

        // dengan menggunakan arrow function sehingga tdk perlu return
         $query->when($filters['author'] ?? false, fn($query, $author)=>
              $query->whereHas('author', fn($query)=>
              $query->where('username', $author))
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // karena satu postingan hanya membutuhkan satu user, one to one
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    
    {
        return 'slug';
    }

    // buat slug otomatis
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

// cara nulis isian table secara singkat
// Post::create([
//     'title' => 'Judul Pertama',
//     'slug' => 'judul-pertama',
//     'excerpt' => 'Lorem ipsum pertama',
//     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium nobis quas magni, recusandae harum nisi sapiente, hic non quasi dolores veritatis amet perspiciatis similique vel culpa quo impedit accusamus!</p> <p>Molestias at perspiciatis recusandae error nihil. Sapiente dolorum cum praesentium iusto obcaecati, neque accusamus beatae recusandae! Sunt quam, porro nesciunt veniam assumenda illo sint,</p><p> corporis consequuntur, rerum reprehenderit quibusdam. Harum sit aut consequuntur et eius iure explicabo nam. Debitis aperiam totam, sed earum voluptates tenetur reiciendis sit reprehenderit et asperiores nostrum. Voluptatibus quia illo molestias incidunt deleniti aliquid amet, reiciendis nostrum quisquam assumenda eum, recusandae error veritatis dolor iure possimus corrupti.</p>'
// ])