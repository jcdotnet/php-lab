<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>José Carlos Román Rubio :: Software Engineer</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="page-container">
        <header class="min-h-[65px] tracking-wide px-4 relative z-50">
            <!-- nav menu bg-color dark bg-gray-800
            menu items
            text-color (dark theme) gray-300
            text-color gray-500
            text-color:hover accent
            bg-color (dark theme) bg-white/5
            -->
            <nav class="nav-menu-wrapper border-b border-gray-300 mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="nav-menu relative flex h-16 items-center justify-between">
                    <div class="flex shrink-0 items-center">
                        <a href="/"> 
                            <img src="{{asset('images/jc-blue-letters.png')}}" alt="José Carlos Román Rubio" class="h-8 w-auto" />
                        </a>
                    </div>    
                    <div class="nav-menu-items flex flex-1 items-center justify-center sm:items-stretch sm:justify-start hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="/" class="{{request()->is('/') ? 'text-white! bg-accent':'text-gray-500'}} rounded-md px-3 py-2 text-sm font-medium hover:bg-accent hover:text-white">Home</a>
                        </div>  
                    </div>
                    <!-- maybe to-do: dark mode switch here -->
                    <div class="nav-menu-buttons ml-auto flex items-center sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <a href="https://www.facebook.com/jc11235" class="flex items-center pr-2" title="Follow on Facebook" target="_blank">
                            <i class="fa-brands fa-square-facebook text-3xl text-facebook"></i>
                        </a>
                        <a href="https://github.com/jcdotnet" class="flex items-center pr-2" title="GitHub" target="_blank">
                            <i class="fa-brands fa-square-github text-3xl text-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/romanrubio/" class="flex items-center pr-2" title="Follow on LinkedIn" target="_blank">
                            <i class="fa-brands fa-linkedin text-3xl text-linkedin"></i>
                        </a>
                        <a href="https://x.com/jcdev_" class="flex items-center pr-2" title="Follow on X" target="_blank">
                            <i class="fa-brands fa-square-x-twitter text-3xl text-black"></i>
                        </a>
                        <div class="nav-menu-button inset-y-0 flex items-center sm:hidden">
                            <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 focus:outline-2 focus:-outline-offset-1 focus:outline-accent">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open dropdown menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu" hidden class="block sm:hidden">
                    <div class="space-y-1 px-2 pt-2 pb-3">
                        <a href="/" class="{{request()->is('/') ? 'text-white! bg-accent':'text-gray-500'}} block rounded-md rounded-md px-3 py-2 text-base font-medium hover:bg-accent hover:text-white">Home</a>
                    </div>
                </div>
            </nav>
        </header>
        <div id="main-content">
            {{$slot}}
        </div>
        <footer>
            <div class="bg-accent py-7">
                <p class="text-center text-white font-medium">Copyright &copy; {{date('Y')}} José Carlos Román Rubio</p>
            </div>
        </footer>
    </div>
    <x-body-scripts>
        @if ( request()->is('/') )
            <script src="{{asset('scripts/typewriter.js')}}"></script>
        @endif
    </x-body-scripts>
</body>
</html>