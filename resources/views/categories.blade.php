@extends('layouts.main')
@section('container')
    <div class="text-3xl ml-6 mt-10 font-bold">{{ $title }}</div>
    <div class="container mx-auto pt-4 pl-6">
        <div class="grid grid-cols-4 gap-4">
        @foreach ($categories as $category)
            <div class="max-w-lg mb-4 rounded">
                <a href="/posts?category={{ $category->slug }}">
                <div class="flex items-center justify-center">
                    <div class="bg-slate-900 bg-opacity-50 py-4 px-16 text-3xl text-white absolute mt-52">
                            {{ $category->name }}
                    </div>
                </div>
                <img class="w-full rounded-lg" src="https://source.unsplash.com/500x300/?{{ $category->name }}" alt="Post image">
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection