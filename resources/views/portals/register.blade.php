@extends('layouts.main')

@section('container')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto w-32 pt-20" src="{{ $logo }}" alt="">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register" method="POST">
      @csrf
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
        <div class="mt-2">
          <input id="name" name="name" required type="text" autocomplete="text" class="block w-full rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#50C4ED] sm:text-sm sm:leading-6 @if($errors->has('name')) border-2 border-rose-500 is-invalid @else border-none shadow @endif" value="{{ old('name') }}">
          @error('name')
          <div class=" text-red-700 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
          </div>
          @enderror
        </div>
      </div>
      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input id="username" name="username" required type="text" autocomplete="text" class="block w-full rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#50C4ED] sm:text-sm sm:leading-6 @if($errors->has('username')) border-2 border-rose-500 is-invalid @else border-none shadow @endif" value="{{ old('username') }}">
          @error('username')
          <div class="text-red-700 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
          </div>
          @enderror
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" required type="email" autocomplete="email" class="block w-full rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#50C4ED] sm:text-sm sm:leading-6 @if($errors->has('email')) border-2 border-rose-500 is-invalid @else border-none shadow @endif" value="{{ old('email') }}">
          @error('email')
          <div class="text-red-700 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
          </div>
          @enderror
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" required type="password" autocomplete="current-password" class="block w-full rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#50C4ED] sm:text-sm sm:leading-6 @if($errors->has('password')) border-2 border-rose-500 is-invalid @else border-none shadow @endif" value="{{ old('password') }}">
          @error('password')
          <div class="text-red-700 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
          </div>
          @enderror
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-[#50C4ED] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#7FC7D9] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#50C4ED]">Register</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Already registered?
      <a href="/login" class="font-semibold leading-6 text-[#50C4ED] hover:text-[#7FC7D9]">Let's Login!</a>
    </p>
  </div>
</div>
@endsection
