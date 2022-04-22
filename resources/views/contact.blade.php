@extends('layouts.homenav')
@section('title', 'Contact')
@section('content')
<!-- component -->
<style>
    /* RED BORDER ON INVALID INPUT */
    .check input:invalid {
        border-color: red;
    }

    /* FLOATING LABEL */
    .label-floating input:not(:placeholder-shown),
    .label-floating textarea:not(:placeholder-shown) {
        padding-top: 1.4rem;
    }

    .label-floating input:not(:placeholder-shown)~label,
    .label-floating textarea:not(:placeholder-shown)~label {
        font-size: 0.8rem;
        transition: all 0.2s ease-in-out;
        color: #1f9d55;
        opacity: 1;
    }

</style>

<section>
    <div class="container flex flex-col items-center px-5 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col w-full max-w-3xl mx-auto prose text-left prose-blue">
            <div class="w-full mx-auto">
                <h1 class="text-5xl text-center font-extrabold">CONTACT US</h1>

        
                <p class="text-center mt-8">Address Here </p>

            </div>
        </div>
    </div>
</section>

<form id="contact-me" class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">


    
    <!-- name field -->
    <div class="flex flex-wrap mb-6">
        <div class="relative w-full appearance-none label-floating">
            <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text" placeholder="Your name" required>
            <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                Your name
            </label>
        </div>
    </div>
    <!-- email field -->
    <div class="flex flex-wrap mb-6">
        <div class="relative w-full appearance-none label-floating">
            <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text" placeholder="Your email" required>
            <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                Your email
            </label>
        </div>
    </div>
    <!-- Message field -->
    <div class="flex flex-wrap mb-6">
        <div class="relative w-full appearance-none label-floating">
            <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="message" type="text" placeholder="Message..."></textarea>
            <label for="message" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">Message...
            </label>
        </div>
    </div>

    <div class="">
        <button class="w-full shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Send
        </button>

    </div>
</form>


<script>
    //RED BORDER ON INVALID INPUT
    document.getElementById('contact-me').addEventListener("invalid", function(event) {
        this.classList.add('check');
    }, true);




    // TEXT AREA AUTO EXPAND
    var textarea = document.querySelector('textarea.autoexpand');

    textarea.addEventListener('keydown', autosize);

    function autosize() {
        var el = this;
        setTimeout(function() {
            el.style.cssText = 'height:auto; padding: 1.4rem .2rem .5rem';

            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        }, 0);
    }

</script>


@endsection