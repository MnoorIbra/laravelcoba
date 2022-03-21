<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
        [
        "title"=> "Judul Post Pertama",
        "slug"=> "judul-post-pertama",
        "author"=> "Muhammad Noor Ibrahim",
        "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet officiis sunt sapiente accusantium soluta delectus repellendus ipsum error nostrum culpa dolores, libero ex nobis. Iure dolores aliquid ducimus dicta fugit, nostrum at ipsum assumenda perspiciatis totam rerum eos harum voluptatibus similique error tempore tenetur asperiores pariatur inventore cupiditate suscipit voluptates quis animi? Fugiat neque odit nihil blanditiis, commodi dignissimos corporis voluptatem dicta recusandae ad soluta numquam vel sequi modi aspernatur saepe architecto sit pariatur at veritatis velit eius maxime quasi!"
    ],
    [
        "title"=> "Judul Post Kedua",
        "slug"=> "judul-post-kedua",
        "author"=> "Muhammad Noor Ibrahim",
        "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet officiis sunt sapiente accusantium soluta delectus repellendus ipsum error nostrum culpa dolores, libero ex nobis. Iure dolores aliquid ducimus dicta fugit, nostrum at ipsum assumenda perspiciatis totam rerum eos harum voluptatibus similique error tempore tenetur asperiores pariatur inventore cupiditate suscipit voluptates quis animi? Fugiat neque odit nihil blanditiis, commodi dignissimos corporis voluptatem dicta recusandae ad soluta numquam vel sequi modi aspernatur saepe architecto sit pariatur at veritatis velit eius maxime quasi!"  
    ],
    ];


    public static function all(){
        return collect(self::$blog_posts);
    }


    public static function find($slug){
        $posts = static::all();
    
    
    return $posts->firstWhere('slug', $slug);
    }
}


    


