@extends('layouts.main')

@section('container')
    <div class="ml-7 py-5 border-b text-sky-600 text-2xl">{{ $title }}</div>

    <div class="container p-4 ml-3">
        <form action="/posts">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif

            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" id="default-search" value="{{ request('search') }}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pencarian...">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    </div>

    @if ($posts->count())
        <div class="bg-white py-2">
            @if(Request::is('posts') && $posts->currentPage() == 1)
                <div class="mx-auto px-6 lg:px-8 border-b border-gray-200 sm:mb-10 sm:pb-10">
                    <div class="mx-auto lg:mx-0">
                        <article class="bg-white shadow-md shadow-sky-100 p-4 sm:p-8 rounded-md mb-4 flex items-center justify-center">
                            @if( $posts[0]->image )
                                <a href="/posts/{{ $posts[0]->slug }}">
                                    <img class="w-full rounded-xl max-sm:hidden max-w-[256px] max-h-[256px] overflow-hidden" src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}">
                                </a>
                            @else
                                <a href="/posts/{{ $posts[0]->slug }}">
                                    <img class="w-full rounded-xl max-sm:hidden" src="https://source.unsplash.com/256x256/?{{ $posts[0]->category->name }}" alt="Post image">
                                </a>
                            @endif
                            <div class="ml-4">
                                <div class="text-xs">
                                    <div class="top-[275px] ml-4">
                                        <time datetime="{{ $posts[0]->created_at->diffForHumans() }}" class="text-gray-500">{{ $posts[0]->created_at->diffForHumans() }}</time>
                                        <a href="/posts?category={{ $posts[0]->category->slug }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $posts[0]->category->name }}</a>
                                    </div>
                                    <div class="group relative ml-4 top-1">
                                        <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                            <a href="/posts/{{ $posts[0]->slug }}">
                                                <span class="absolute inset-0"></span>
                                                {{ $posts[0]->title }}
                                            </a>
                                        </h3>
                                        <p class="max-w-2xl mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $posts[0]->excerpt }}</p>
                                    </div>
                                    <div class="border-b my-8 ml-4"></div>
                                    <div class="relative ml-4 flex items-center gap-x-4">
                                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                        <div class="text-sm leading-6">
                                            <p class="font-semibold text-gray-900">
                                                <a href="/posts?author={{ $posts[0]->author->username }}">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $posts[0]->author->name }}
                                                </a>
                                            </p>
                                            <p class="text-gray-600">Writer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            @endif
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts->skip(1) as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        @if( $post->image )
                            <a href="/posts/{{ $post->slug }}">
                                <img class="rounded-xl max-w-[500px] max-h-[300px] overflow-hidden" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                            </a>
                        @else
                            <a href="/posts/{{ $post->slug }}">
                                <img class="w-full rounded-xl" src="https://source.unsplash.com/500x300/?{{ $post->category->name }}" alt="Post image">
                            </a>
                        @endif
                        <div class="flex items-center gap-x-4 text-xs pt-2">
                            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
                            <a href="/posts?category={{ $post->category->slug }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</a>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="/posts/{{ $post->slug }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->excerpt }}</p>
                        </div>
                        <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <a href="/posts?author={{ $post->author->username }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->author->name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">Writer</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="py-10">
                {{ $posts->links() }}
        </div>
        
    @else
        <div class="text-center text-2xl font-semibold">No Post Found.</div>
    @endif
@endsection
