<div>
    @if($noInfo)

    <!-----
          add this code to this very first div:
          fixed inset-0 z-10
        -->
    <div class=" fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
            <!--This is the background that overlays when the modal is active. It  has opacity, and that's why the background looks gray.-->
            <!-----
          add this code to this very first div:
          fixed inset-0
        -->
            <div class="transition-opacity bg-blue-500 bg-opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <!--Modal panel : This is where you put the pop-up's content, the div on top this coment is the wrapper -->
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
                    <div class="mt-3 text-left sm:mt-5">
                        <h1 class="
                  mb-8
                  text-2xl
                  font-semibold
                  leading-none
                  tracking-tighter
                  text-neutral-600
                "> Complete Profile </h1>
                        <p class="mx-auto text-base leading-relaxed text-gray-500"> Please complete your profile before continuing.. </p>
                    </div>
                </div>
                <div class="mt-6 sm:flex">
                    <div class="mt-3 rounded-lg sm:mt-0">
                        <button wire:click.prevent="$set('noInfo', false)" class="

                  items-center
                  block
                  px-10
                  py-3.5
                  text-base
                  font-medium
                  text-center text-blue-600
                  transition
                  duration-500
                  ease-in-out
                  transform
                  border-2 border-white
                  shadow-md
                  rounded-xl
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-gray-500
                "> Cancel </button>

                    </div>
                    <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                        <form action="{{ route('patient.profile') }}">
                        <button wire:click="addInfo" class="
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
                "> Complete Profile </button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

 <section class="text-gray-600 body-font">
     <div class="container px-5 py-24 mx-auto">
         <div class="flex flex-col text-center w-full mb-20">
             <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
         </div>
         <div class="flex flex-wrap -m-4 text-center">
             <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                 <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                     <svg class="text-blue-400 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">

                         <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                         <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z" /></svg>

                     <h2 class="title-font font-medium text-3xl text-gray-900">{{ $orders }}</h2>
                     <p class="leading-relaxed">Orders</p>
                 </div>
             </div>
             <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                 <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                     <svg class="text-blue-400 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                         <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                         <path d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368zM476.7 324.7L416 385.4L387.3 356.7C381.1 350.4 370.9 350.4 364.7 356.7C358.4 362.9 358.4 373.1 364.7 379.3L404.7 419.3C410.9 425.6 421.1 425.6 427.3 419.3L499.3 347.3C505.6 341.1 505.6 330.9 499.3 324.7C493.1 318.4 482.9 318.4 476.7 324.7H476.7z" /></svg>

                     <h2 class="title-font font-medium text-3xl text-gray-900">{{ $prescription }}</h2>
                     <p class="leading-relaxed">Prescription</p>
                 </div>
             </div>
             <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                 <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                     <svg class="text-blue-400 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">

                         <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                         <path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z" /></svg>

                     <h2 class="title-font font-medium text-3xl text-gray-900">74</h2>
                     <p class="leading-relaxed">Active Prescriptions</p>
                 </div>
             </div>
             <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                 <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                     <svg class="text-blue-400 w-12 h-12 mb-3  inline-block" xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                         <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                         <path d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM99.5 144.8C77.15 176.1 64 214.5 64 256C64 362 149.1 448 256 448C297.5 448 335.9 434.9 367.2 412.5L99.5 144.8zM448 256C448 149.1 362 64 256 64C214.5 64 176.1 77.15 144.8 99.5L412.5 367.2C434.9 335.9 448 297.5 448 256V256z" /></svg>

                     <h2 class="title-font font-medium text-3xl text-gray-900">46</h2>
                     <p class="leading-relaxed">Inactive Prescriptions</p>
                 </div>
             </div>
         </div>
     </div>
 </section>


    
</div>
