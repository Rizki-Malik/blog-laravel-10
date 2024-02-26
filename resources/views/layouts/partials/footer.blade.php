<p class="mb-4 text-sm text-center text-slate-100 dark:text-gray-400 sm:mb-0">
    &copy; 2024 Kode QWERTY | The blog named Kode QWERTY is managed by Muhammad Rizki Malik Aziz.
</p>
<div class="flex justify-center items-center space-x-10">
    <a href="/" class="text-sm font-semibold leading-6 {{ Request::is('/') ? 'text-blue-800' : 'text-slate-100' }}">Home</a>
    <a href="/about" class="text-sm font-semibold leading-6 {{ Request::is('about') ? 'text-blue-800' : 'text-slate-100' }}">About</a>
    <a href="/posts" class="text-sm font-semibold leading-6 {{ Request::is('posts') ? 'text-blue-800' : 'text-slate-100' }}">Blog</a>
    <a href="/categories" class="text-sm font-semibold leading-6 {{ Request::is('categories') ? 'text-blue-800' : 'text-slate-100' }}">Categories</a>
</div>