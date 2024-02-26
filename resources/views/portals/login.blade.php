@extends('layouts.main')

@section('container')
<div class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto w-32 pt-20" src="{{ $logo }}" alt="">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    @if (session()->has('success'))
      <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        <strong class="font-bold text-center block mb-2">Success!</strong>
        <span class="block sm:inline text-center">{{ session('success') }}</span>
      </div>
    @endif
    @if (session()->has('loginErr'))
      <div id="success-alert" class="bg-red-100 border-2 border-rose-500 text-red-700 px-4 py-3 rounded relative">
        <strong class="font-bold text-center block mb-2">Access denied!</strong>
        <span class="block sm:inline text-center">{{ session('loginErr') }}</span>  
      </div>
    @endif
    <form class="space-y-6" action="/login" method="POST">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#50C4ED] sm:text-sm sm:leading-6 
          @if($errors->has('name')) border border-red-500 is-invalid @else border-none shadow @endif" autofocus value="{{ old('email') }}">
          @error('email')
            <div class="text-red-700 py-3 rounded relative" role="alert">
              <span class="block sm:inline">{{ $message }}</span>
            </div>
          @enderror
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-[#50C4ED] hover:text-[#7FC7D9]">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#50C4ED] sm:text-sm sm:leading-6
          @if($errors->has('name')) border border-red-500 is-invalid @else border-none shadow @endif">
          @error('password')
            <div class="text-red-700 py-3 rounded relative" role="alert">
              <span class="block sm:inline">{{ $message }}</span>
            </div>
          @enderror
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-[#50C4ED] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#7FC7D9] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#50C4ED]">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Not registered?
      <a href="/register" class="font-semibold leading-6 text-[#50C4ED] hover:text-[#7FC7D9]">Register Now!</a>
    </p>
  </div>
</div>
  
@endsection