<nav class="mx-auto flex max-w-screen-2xl items-center justify-between p-6 lg:px-8" aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="/" >
            <img class="h-12" src="{{ $logo_nav }}" alt="Logo">
        </a>
    </div>
    <div class="flex lg:hidden">
        <button id="openMenuButton" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        <a href="/" class="text-sm font-semibold leading-6 {{ Request::is('/') ? 'text-blue-800' : 'text-slate-100' }}">Home</a>
        <a href="/about" class="text-sm font-semibold leading-6 {{ Request::is('about') ? 'text-blue-800' : 'text-slate-100' }}">About</a>
        <a href="/posts" class="text-sm font-semibold leading-6 {{ Request::is('posts') ? 'text-blue-800' : 'text-slate-100' }}">Blog</a>
        <a href="/categories" class="text-sm font-semibold leading-6 {{ Request::is('categories') ? 'text-blue-800' : 'text-slate-100' }}">Categories</a>
    </div> 
    
    @auth
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <div class="relative inline-block text-left">
                <div>
                  <button type="button" class="inline-flex w-full justify-center rounded-md" id="menu-button" aria-expanded="false" aria-haspopup="true">
                        <div class="flex justify-center items-center">
                            {{-- <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="img/pp.png" alt={{ auth()->user()->name }}"/> --}}
                            <div class="text-lg mr-1 text-white">Welcome, {{ auth()->user()->username }}</div>
                            <svg class="-mr-1 h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                  </button>
                </div>
              
                <div class="absolute right-0 z-10 mt-2 w-40 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="dropdown-menu">
                  <div class="py-1" role="none">
                    <a href="/dashboard" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 focus:bg-gray-100 focus:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0">
                        <div class="flex justify-start items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                            <div class="ml-2">
                                Dashboard
                            </div>
                        </div>
                    </a>
                    
                  </div>
                  <div class="py-1" role="none">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-700 block w-full py-2 text-sm hover:bg-gray-100 focus:bg-gray-100 focus:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-6">
                            <div class="flex justify-start items-start mx-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                                Log Out
                            </div>
                        </button>
                    </form>
                </div>
                               
            </div>
        </div>
    @else
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="/login" class="text-sm font-semibold leading-6 {{ Request::is('login') ? 'text-blue-800' : 'text-slate-100' }}">
                <div class="flex justify-start items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                      </svg> 
                        <div class="ml-2">                     
                            Login
                        </div>
                </div>
            </a>
        </div>
    @endauth
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="mobileMenu" class="lg:hidden hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-stext-slate-100/10">
            <div class="flex items-center justify-between">
                <a href="#" class="text-lg font-semibold leading-6 text-slate-100">Rizki Malik - Blog</a>
                <button id="closeMenuButton" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                    <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-600 hover:bg-gray-100">Home</a>
                    <a href="/about" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-600 hover:bg-gray-100">About</a>
                    <a href="/posts" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-600 hover:bg-gray-100">Blog</a>
                    <a href="/categories" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-600 hover:bg-gray-100">Categories</a>
                </div>
                <div class="py-6">
                    <a href="/login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-slate-600 hover:bg-gray-100">Log in</a>
                </div>
            </div>
        </div>
    </div>
</div>