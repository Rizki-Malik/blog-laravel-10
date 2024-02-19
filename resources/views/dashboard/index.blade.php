@extends('dashboard.layouts.main')
@section('container')

<main class="p-4 md:ml-64 h-screen pt-20">
    <div class="flex-grow flex overflow-x-hidden">
        <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
          <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
            <div class="flex w-full items-center">
              <div class="flex items-center text-3xl text-gray-900 dark:text-white mb-4 sm:mb-7">
                <img src="/img/{{ $image }}" class="w-12 mr-4 rounded-full" alt="profile" />
                {{ auth()->user()->name }}
              </div>
            </div>
          </div>
          <div class="my-2">
            <div class="text-xl">
              
            </div>
          </div>
        </div>
    </div>
</main>

@endsection