@extends('dashboard.layouts.main')
@section('container')

<main class="p-4 md:ml-64 pt-20 h-screen">
    <div class="flex-grow flex overflow-x-hidden">
        <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
            <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
                <div class="flex w-full items-center">
                    <div class="flex items-center text-3xl text-gray-900 dark:text-white mb-4 sm:mb-7">
                    {{ $title }}
                    </div>
                </div>
            </div>
            <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Unleash new ideas and assign precise labels to shape spaces for valuable and relevant content.</h2>
                <form action="/dashboard/categories/{{ $category->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 @error('name') dark:border-red-500 @enderror" placeholder="Type name" required autofocus value="{{ old('name', $category->name) }}">
                            @error('name')
                                <div class="my-1 text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Slug</label>
                            <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 @error('slug') dark:border-red-500 @enderror" placeholder="Type slug" required readonly value="{{ old('slug', $category->slug) }}">
                            @error('slug')
                                <div class="my-1 text-red-500">{{ $message }}</div>                                    
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white dark:bg-sky-700 rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 dark:hover:bg-sky-800">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('input', function() {
        const nameValue = name.value.trim();
        const slugValue = slugify(nameValue);

        slug.value = slugValue;
    });

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Ganti spasi dengan tanda hubung
            .replace(/[^\w\-]+/g, '')       // Hapus karakter non-word dan non-dash
            .replace(/\-\-+/g, '-')         // Ganti beberapa tanda hubung berurutan dengan satu tanda hubung
            .replace(/^-+/, '')             // Hapus tanda hubung dari awal teks
            .replace(/-+$/, '');            // Hapus tanda hubung dari akhir teks
    }
</script>
@endsection