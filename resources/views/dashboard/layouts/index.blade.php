@extends('dashboard.layouts.main')
@section('container')

<main class="p-4 md:ml-64 h-screen pt-20">
    <div class="flex-grow flex overflow-x-hidden">
        <div class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden p-5">
          <div class="text-xs text-gray-400 tracking-wider">USERS</div>
          <div class="relative mt-2">
            <input type="text" class="pl-8 h-9 bg-transparent border border-gray-300 dark:border-gray-700 dark:text-white w-full rounded-md text-sm" placeholder="Search" />
            <svg viewBox="0 0 24 24" class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </div>
          <div class="space-y-4 mt-3">
            <button class="bg-white p-3 w-full flex flex-col rounded-md dark:bg-gray-800 shadow">
              <div class="flex xl:flex-row flex-col items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=200&w=200&s=046c29138c1335ef8edee7daf521ba50" class="w-7 h-7 mr-2 rounded-full" alt="profile" />
                Kathyrn Murphy
              </div>
              <div class="flex items-center w-full">
                <div class="text-xs py-1 px-2 leading-none dark:bg-gray-900 bg-blue-100 text-blue-500 rounded-md">Design</div>
                <div class="ml-auto text-xs text-gray-500">$1,902.00</div>
              </div>
            </button>
            <button class="bg-white p-3 w-full flex flex-col rounded-md dark:bg-gray-800 shadow-lg relative ring-2 ring-blue-500 focus:outline-none">
              <div class="flex xl:flex-row flex-col items-center font-medium text-gray-900 dark:text-white pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 dark:border-gray-700 w-full">
                <img src="https://assets.codepen.io/344846/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1582611188&width=512" class="w-7 h-7 mr-2 rounded-full" alt="profile" />
                Mert Cukuren
              </div>
              <div class="flex items-center w-full">
                <div class="text-xs py-1 px-2 leading-none dark:bg-gray-900 bg-green-100 text-green-600 rounded-md">Sales</div>
                <div class="ml-auto text-xs text-gray-500">$2,794.00</div>
              </div>
            </button>
          </div>
        </div>
        <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
          <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
            <div class="flex w-full items-center">
              <div class="flex items-center text-3xl text-gray-900 dark:text-white">
                <img src="/img/{{ $image }}" class="w-12 mr-4 rounded-full" alt="profile" />
                {{ auth()->user()->name }}
              </div>
                <div class="ml-auto sm:flex hidden items-center justify-end">
                    @if (session()->has('success'))
                    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="ms-auto mx-2 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                          <span class="sr-only">Close</span>
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex items-center space-x-3 sm:mt-7 mt-4">
              <a href="/dashboard/posts" class="px-3 border-b-2 border-transparent text-blue-500 {{ Request::is('dashboard/posts') ? 'dark:text-white dark:border-white' : 'text-gray-600 dark:text-gray-400' }} pb-1.5">Posts</a>
              <a href="/dashboard/categories" class="px-3 border-b-2 border-transparent {{ Request::is('dashboard/categories') ? 'dark:text-white dark:border-white' : 'text-gray-600 dark:text-gray-400' }} pb-1.5">Categories</a>
              <a href="#" class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5">Comments</a>
            </div>
          </div>
          @yield('content')
        </div>
      </div>
</main>
@endsection