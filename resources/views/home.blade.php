@extends('layouts.homenav')
@section('title', 'Home-EPharmacy')

@section('content')

<section style="background-image: url('https://images.pexels.com/photos/593451/pexels-photo-593451.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');" class="w-full bg-cover bg-fixed ">


<div class="w-full bg-gray-900 bg-opacity-50">

    <div class="
          relative
          items-center
          w-full
          px-5
          py-12
          mx-auto
          md:px-12
          lg:px-16
          max-w-7xl
          lg:py-36
          
        ">
        <div class="flex w-full mx-auto text-left">
            <div class="relative inline-flex items-center mx-auto align-middle">
                <div class="text-center">
                    <h1 class="
                  max-w-5xl
                  text-2xl
                  font-bold
                  leading-none
                  tracking-tighter
                  text-white
                  md:text-5xl
                  lg:text-6xl lg:max-w-7xl
                "> Save Time <br class="hidden lg:block"> Save Money </h1>
                    <p class="
                  max-w-xl
                  mx-auto
                  mt-8
                  text-base
                  leading-relaxed
                  text-white
                "> Fill your prescription without the hassle and the wait </p>
                    <div class="flex justify-center w-full max-w-2xl gap-2 mx-auto mt-6">
                        <div class="mt-3 rounded-lg sm:mt-0">
                            <form action="{{ route('register') }}">
                            <button class="
                      items-center
                      block
                      px-5
                      py-4
                      text-base
                      font-medium
                      text-center text-blue-700
                      transition
                      duration-500
                      ease-in-out
                      transform
                      bg-white
                      lg:px-10
                      rounded-xl
                      hover:bg-emerald-400
                      hover:text-white
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-blue-400
                    "> Get Started </button>
                    </form>

                        </div>
                        <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                            <form action="#features">
                            <button class="
                      items-center
                      block
                      px-5
                      lg:px-10
                      py-3.5
                      text-base
                      font-medium
                      bg-blue-700
                      text-center text-white
                      transition
                      duration-500
                      ease-in-out
                      transform
                      border-2 border-blue-700
                      shadow-md
                      rounded-xl
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-gray-500
                    "> See features </button> </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="intro">
            {{-- <div class="
              flex flex-col
              items-center
              justify-center
              pt-24
              mx-auto
              rounded-lg
              lg:px-10
              max-w-7xl
              border -2
            ">
                <img class="object-cover object-center w-full rounded-xl" alt="hero" src="https://images.pexels.com/photos/3652750/pexels-photo-3652750.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">

            </div> --}}
        </section>
    </div>
    </div>

</section>

<section class="text-gray-600 body-font">
    <h1 class="font-bold text-center text-blue-700 mt-8 text-6xl uppercase"> How it Works</h1>
    <div id="features" class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-wrap w-full">
            <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
                        <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                    </div>
                </div>
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 2</h2>
                        <p class="leading-relaxed">Vice migas literally kitsch +1 pok pok. Truffaut hot chicken slow-carb health goth, vape typewriter.</p>
                    </div>
                </div>
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <circle cx="12" cy="5" r="3"></circle>
                            <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                        </svg>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 3</h2>
                        <p class="leading-relaxed">Coloring book nar whal glossier master cleanse umami. Salvia +1 master cleanse blog taiyaki.</p>
                    </div>
                </div>
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 4</h2>
                        <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                    </div>
                </div>
                <div class="flex relative">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
                        <p class="leading-relaxed">Pitchfork ugh tattooed scenester echo park gastropub whatever cold-pressed retro.</p>
                    </div>
                </div>
            </div>
            <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="https://images.pexels.com/photos/5082239/pexels-photo-5082239.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="step">

        </div>
    </div>
</section>


<section>
    <div class="px-4 py-12 mx-auto max-w-screen-2xl sm:px-6 md:px-12 lg:px-24 lg:py-24 bg-gradient-to-r from-blue-400 to-emerald-400">


        <div class="flex flex-col w-full mb-12 text-left lg:text-center">
            <p class="
              max-w-xl
              mx-auto
              mt-8
              text-base
              leading-relaxed
              text-center text-white
            "> Free and Premium themes, UI Kit's, templates and landing pages built with Tailwind CSS, HTML &amp; Next.js. </p>
            <a class="
              mx-auto
              mt-8
              text-sm
              font-semibold
              text-blue-600
              hover:text-neutral-600
            " title="read more"> Read more about the offer » </a>
        </div>
    </div>
</section>

@endsection
