<div>
    
     <div class="overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
         <div class="
          flex
          items-end
          justify-center
          min-h-screen
          px-4
          pt-4
          pb-20
          text-center
          sm:block sm:p-0
        ">
             
             <div class="transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
             <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

             <div class="
            inline-block
            p-5
            overflow-hidden
            text-left
            align-bottom
            transition-all
            transform
            bg-white
            rounded-lg
            shadow-2xl
            lg:p-16
            sm:my-8 sm:align-middle sm:max-w-xl sm:w-full
          ">
                 <div>
                     <div class="mt-3 sm:mt-5">
                         <h1 class="
                  mb-8
                  text-2xl
                  font-semibold 
                 text-center
                  text-blue-500
                  uppercase
                "> Account Details </h1>
                         <h1 class="
                  mb-8
                  text-2xl
                  font-semibold
                  leading-none
                  tracking-tighter
                  text-neutral-600
                "> {{ $info['0']->user->fname }} {{ $info['0']->user->lname }} </h1>
                <p class="mx-auto text-base mb-4 leading-relaxed text-gray-500"><span class="font-medium"> Registration Number: </span> {{ $info['0']->mx_no }}</p>


                         <p class="mx-auto text-base leading-relaxed text-gray-500"><span class="font-medium"> Address: </span> {{ $info['0']->address }}, {{ $info['0']->city }} {{ $info['0']->parish }}</p>


                     </div>
                 </div>
                 <div class="mt-6 sm:flex">
                   
                     <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                         <button class="
                  items-center
                  block
                  px-10
                  py-4
                  text-base
                  font-medium
                  text-center text-white
                  transition
                  duration-500
                  ease-in-out
                  transform
                  bg-blue-600
                  rounded-xl
                  hover:bg-blue-700
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-blue-500
                "> Edit </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>

</div>
