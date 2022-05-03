<div>
     <section class="text-gray-600 body-font">
         <div class="container px-5 py-24 mx-auto">
             <div class="flex flex-col text-center w-full mb-20">
                 <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
             </div>
             <div class="flex flex-wrap -m-4 text-center">
                 <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                     <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                         <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                             <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                             <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" /></svg>

                         <h2 class="title-font font-medium text-3xl text-gray-900">{{ $patient }}</h2>
                         <p class="leading-relaxed">Patients</p>
                     </div>
                 </div>
                 <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                     <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                         <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                             <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                             <path d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368zM448 303.1C448 295.2 440.8 287.1 432 287.1C423.2 287.1 416 295.2 416 303.1V351.1H368C359.2 351.1 352 359.2 352 367.1C352 376.8 359.2 383.1 368 383.1H416V431.1C416 440.8 423.2 447.1 432 447.1C440.8 447.1 448 440.8 448 431.1V383.1H496C504.8 383.1 512 376.8 512 367.1C512 359.2 504.8 351.1 496 351.1H448V303.1z" /></svg>

                         <h2 class="title-font font-medium text-3xl text-gray-900">{{ $prescription }}</h2>
                         <p class="leading-relaxed">Prescriptions</p>
                     </div>
                 </div>
                 
                 
             </div>
         </div>
     </section>

</div>
