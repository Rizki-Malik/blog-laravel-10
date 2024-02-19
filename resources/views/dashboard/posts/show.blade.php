@extends('dashboard.layouts.main')
@section('container')

<div class="container max-w-4xl mx-auto text-white">
    <div class="px-6 py-16">
      <article class="h-screen">
        <h2 class="text-4xl mt-10">{{ $post->title }}</h2>
        <div class="flex justify-start">
            <a href="/dashboard/posts">
                <button class="bg-green-600 rounded-lg flex justify-center p-2 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                    <div>
                        Back to posts
                    </div>
                </button>
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit">
                <button class="bg-yellow-500 rounded-lg flex justify-center p-2 m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>                  
                    <div>
                        Edit
                    </div>
                </button>
            </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                @method('delete')
                @csrf
                <button class="bg-red-600 rounded-lg flex justify-center p-2 my-2" onclick="return confirm('Are you sure?')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>                      
                    <div>
                        Delete this post
                    </div>
                </button>
            </form>
        </div>

        @if( $post->image )
            <img class="rounded-2xl py-2 max-w-[1200px] max-h-[400px] overflow-hidden" src="{{ asset('storage/' . $post->image) }}" alt="Post image">
        @else
            <img class="rounded-2xl py-2" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="Post image">
        @endif
        <div class="mt-2">{!! $post->body !!}</div>
      </article>
    </div>
</div>

@endsection