<div>
<button wire:click.prevent="$set('', true)" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
    New Prescription
</button>


       @if($viewInfo)

       <!-----
      add this code to this very first div:
      fixed inset-0 z-10
    -->
       <div class="overflow-y-auto fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

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
               <div class="transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>


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
                       <div class="text-center flex justify-end"><i wire:click="$set('viewInfo', false)" class="fas fa-times text-2xl cursor-pointer"></i></div>
                       <div class="mt-3 text-left sm:mt-5">
                           <h2 class="
                  mb-4
                  text-2xl
                  font-semibold
                  tracking-widest
                  text-black
                  uppercase
                "> {{ $singlePrescription->patient->user->fname }} {{ $singlePrescription->patient->user->lname }} </h2>

                           <h5 class="
                  mb-8
                  text-lg
                  font-semibold
                  leading-none
                  tracking-tighter
                  text-neutral-600
                "> {{ $singlePrescription->patient->address }} {{ $singlePrescription->patient->city }}, {{ $singlePrescription->patient->parish }}</h5>
                           <h4 class="
                  mb-8
                  text-xl
                  font-medium
                  leading-none
                  tracking-tighter
                  text-neutral-600">{{ $singlePrescription->drug->drug_name }} </h4>
                           <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Dosage: </span>{{ $singlePrescription->dosage }} </p>
                           <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Directions: </span>{{ $singlePrescription->directions }} </p>
                           <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Quantity: </span>{{ $singlePrescription->quantity }} </p>
                           <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Duration: </span>{{ $singlePrescription->duration }} </p>
                           <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Repeat: </span>{{ $singlePrescription->repeat }} </p>
                       </div>
                   </div>
                   <div class="mt-6 sm:flex">
                       {{-- <div class="mt-3 rounded-lg sm:mt-0">
                        <button class="
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
                "> See features </button>
                    </div>
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
                "> Get bundle </button>
                    </div> --}}
                   </div>
               </div>
           </div>
       </div>

       @endif

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap -m-4">
                @foreach($doctor as $prescription)

                <div class="p-4 lg:w-1/2 md:w-full">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">    
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ $prescription->patient->user->fname }} {{ $prescription->patient->user->lname }}</h2>

                            <p class="leading-relaxed text-base"><span class="font-medium"> Drug :</span>{{ $prescription->drug->drug_name }}</p>
                            <p class="leading-relaxed text-base"><span class= "font-medium"> Dosage: </span>{{ $prescription->dosage}}</p>
                            <p class="leading-relaxed text-base"><span class="font-medium">Directions :</span>{{ $prescription->directions}}</p>
                            <button wire:click.prevent="viewPrescription({{ $prescription->id }})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                View Prescription
                            </button>

                        </div>
                    </div>
                </div>
                 @endforeach

            </div>
        </div>
       {{ $doctor->links() }}
    </section>

     
</div>
