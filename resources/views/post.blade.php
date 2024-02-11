@extends('layouts.main')

@section('container')
<div class="container max-w-6xl mx-auto">
    <div class="px-6 py-4">
      <article>
        <h2 class="text-4xl mt-10">{{ $post->title }}</h2>
        <h5 class="text-xl mt-4">By. <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
        <img class="rounded-2xl py-2" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="Post image">
        <div class="mt-2">{!! $post->body !!}</div>
      </article>
      <p class="mt-10">
        <a href="/posts">Back to Posts</a>
      </p>
    </div>
  </div>
  
@endsection