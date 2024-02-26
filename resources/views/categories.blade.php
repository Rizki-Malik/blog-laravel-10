@extends('layouts.main')
@section('container')
<div class="h-screen">
    <div class="text-3xl ml-6 mt-10 font-bold">{{ $title }}</div>
    <div class="container mx-auto pt-4 pl-6">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($categories as $category)
            <div class="relative max-w-lg mb-4 rounded">
                <a href="/posts?category={{ $category->slug }}">
                    <img class="w-full rounded-lg" src="{{ $category->name === 'Personal' ? 'https://source.unsplash.com/500x300/?room' : 'https://source.unsplash.com/500x300/?' . $category->name }}" alt="Post image">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="bg-slate-900 bg-opacity-50 py-4 w-full text-center text-3xl text-white">
                            {{ $category->name }}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection