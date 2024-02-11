<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Rizki",
            "slug" => "judul-post-pertama",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ut excepturi quaerat nulla doloribus officiis commodi libero laudantium, voluptas, necessitatibus odio eos a molestiae eveniet unde facilis non ipsa eligendi?"
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Malik",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ut excepturi quaerat nulla doloribus officiis commodi libero laudantium, voluptas, necessitatibus odio eos a molestiae eveniet unde facilis non ipsa eligendi?"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

}