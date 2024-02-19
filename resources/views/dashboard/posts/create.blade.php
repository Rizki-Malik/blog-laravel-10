@extends('dashboard.layouts.main')
@section('container')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

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
            <div class="">
                <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Embark on the journey of creating posts with purpose and passion.</h2>
                    <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('title') dark:border-red-500 @enderror" placeholder="Type title" required autofocus value="{{ old('title') }}">
                                @error('title')
                                    <div class="my-1 text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Post Image</label>
                                <img class="img-preview">
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') dark:border-red-500 @enderror" id="image" type="file" name="image" onchange="previewImage()">
                                @if($errors->has('image'))
                                    <p class="mt-1 text-sm text-red-500 dark:text-red-500" id="image_context">{{ $errors->first('image') }}</p>
                                @else
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_context">SVG, PNG or JPG (Recommend. 1200x400px).</p>
                                @endif
                            </div>
                            <div class="w-full">
                                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Slug</label>
                                <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('slug') dark:border-red-500 @enderror" placeholder="Type slug" required readonly {{ old('slug') }}>
                                @error('slug')
                                    <div class="my-1 text-red-500">{{ $message }}</div>                                    
                                @enderror
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"  {{ old('category_id') == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="sm:col-span-2">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                                    @error('body')
                                        <p class="my-1 text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                <textarea id="body" name="body" class="h-full" value="{{ old('body') }}"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white dark:bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 dark:hover:bg-primary-800">
                            Create post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    const generateRandomString = (minLength, maxLength) => {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const length = Math.floor(Math.random() * (maxLength - minLength + 1)) + minLength;
        return Array.from({ length }, () => characters[Math.floor(Math.random() * characters.length)]).join('');
    };

    const updateSlug = () => {
        const titleValue = title.value.trim().toLowerCase();
        const randomStringLength = generateRandomString(8, 10);
        const slugValue = `${titleValue.replace(/\s+/g, '-')}-${randomStringLength}`;
        slug.value = slugValue;
    };

    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    
    const mainElement = document.querySelector('main');

    window.addEventListener('scroll', function() {
        mainElement.classList.add('h-full');
        mainElement.classList.remove('h-screen');
    });

    slug.addEventListener('focus', updateSlug);
</script>
@endsection