<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];
    // cara menghubungkan model post dan category
    public function Category(){
        return $this->belongsTo(Category::class);
    }


    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('body', 'like', '%' . $search . '%');
             });
         });

         $query->when($filters['user'] ?? false, function($query, $user){
            return $query->whereHas('user', function($query) use ($user){
               $query->where('username', $user);
         });

         });

         $query->when($filters['category'] ?? false, function($query, $category){
             return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
             });
         });
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getrouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
