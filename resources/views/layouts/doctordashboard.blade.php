<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/812b520597.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @livewireStyles
</head>
<body>
    <div class="flex h-screen overflow-hidden bg-white rounded-lg">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="
              flex flex-col flex-grow
              pt-5
              overflow-y-auto
              border-r
              bg-neutral-800
            ">
                    <div class="flex flex-col items-center flex-shrink-0 px-4">
                        <a href="./index.html" class="px-8 text-left focus:outline-none">
                            <h2 class="
                    block
                    p-2
                    text-xl
                    font-medium
                    tracking-tighter
                    transition
                    duration-500
                    ease-in-out
                    transform
                    cursor-pointer
                    text-neutral-200
                    hover:text-neutral-200
                  "> {{ auth()->user()->user_type }} </h2>

                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <nav class="flex-1 space-y-1 bg-neutral-800">
                            <ul>
                                <li>
                                    <a class="
                        inline-flex
                        items-center
                        w-full
                        px-4
                        py-2
                        mt-1
                        text-base
                        transition
                        duration-500
                        ease-in-out
                        transform
                        border
                        rounded-lg
                        text-neutral-200
                        bg-neutral-900
                        border-neutral-900
                        focus:shadow-outline
                      " white="" 70="" href="{{ route('doctor.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span class="ml-4"> Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="
                        inline-flex
                        items-center
                        w-full
                        px-4
                        py-2
                        mt-1
                        text-base
                        transition
                        duration-500
                        ease-in-out
                        transform
                        border
                        rounded-lg
                        text-neutral-200
                        bg-neutral-900
                        border-neutral-900
                        focus:shadow-outline
                      " white="" 70="" href="{{ route('doctor.patient') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span class="ml-4"> Patients</span>
                                    </a>
                                </li>


                                <li>
                                    <a class="
                        inline-flex
                        items-center
                        w-full
                        px-4
                        py-2
                        mt-1
                        text-base
                        transition
                        duration-500
                        ease-in-out
                        transform
                        border
                        rounded-lg
                        text-neutral-200
                        bg-neutral-900
                        border-neutral-900
                        focus:shadow-outline
                      " white="" 70="" href="{{ route('doctor.prescription') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span class="ml-4"> Prescriptions</span>
                                    </a>
                                </li>

                                <li>
                                    <form action="{{route('logout')  }}" method="post">
                                        @csrf

                                        <button class="
                        inline-flex
                        items-center
                        w-full
                        px-4
                        py-2
                        mt-1
                        text-base
                        transition
                        duration-500
                        ease-in-out
                        transform
                        border
                        rounded-lg
                        text-neutral-200
                        bg-neutral-900
                        border-neutral-900
                        focus:shadow-outline
                      " white="" 70="" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                            <span class="ml-4"> Logout</span>
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <div class="flex flex-shrink-0 p-4 px-4 bg-neutral-900">
                        <a href="#" class="flex-shrink-0 block w-full group">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block rounded-full h-9 w-9" src="./images/wickedlabslogo.jpg" alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-neutral-200">Hello {{ auth()->user()->fname}} {{auth()->user()->lname }}</p>


                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">

                    <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">

                        <div class="py-4">
                            <div class="rounded-lg bg-neutral-50 h-max">@yield('content')</div>

                        </div>
                        <!-- Do not cross the closing tag underneath this coment-->
                    </div>
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>
