<div>
 @if (session()->has('message'))

    <div class="w-full text-white bg-blue-500">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex">
                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>

                <p class="mx-3"> {{ session('message') }}</p>
            </div>

            <button  class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
    @endif



    @if($viewInfo)
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
                    <div class="text-center flex justify-end"><i wire:click="$set('viewInfo', false)" class="fas fa-times text-2xl cursor-pointer"></i></div>

                    <h2 class="
                  mb-4
                  text-2xl
                  font-semibold
                 
                  text-black
                  uppercase
                  text-center
                "> Prescription </h2>

                    <div class="mt-3 text-left sm:mt-5">
                        <h2 class="
                  mb-4
                  text-2xl
                  font-semibold
                  tracking-widest
                  text-black
                  uppercase
                "> <span class="font-medium">Name: </span>{{ $singlePrescription->patient->user->fname }} {{ $singlePrescription->patient->user->lname }} </h2>

                        <h5 class="
                  mb-8
                  text-lg
                  font-semibold
                  leading-none
                  tracking-tighter
                  text-neutral-600
                "><span class="font-medium">Address: </span> {{ $singlePrescription->patient->address }} {{ $singlePrescription->patient->city }}, {{ $singlePrescription->patient->parish }}</h5>

                        <h4 class="
                  mb-8
                  text-xl
                  font-medium
                  leading-none
                  tracking-tighter
                  text-neutral-600"> <span class="font-medium">Drug Name: </span>{{ $singlePrescription->drug->drug_name }} </h4>

                        <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Dosage: </span>{{ $singlePrescription->dosage }} </p>
                        <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Directions: </span>{{ $singlePrescription->directions }} </p>
                        <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Quantity: </span>{{ $singlePrescription->quantity }} </p>
                        <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Duration: </span>{{ $singlePrescription->duration }} </p>
                        <p class="mx-auto text-base leading-relaxed text-black"> <span class="font-medium">Repeat: </span>{{ $singlePrescription->repeat }} </p>
                    </div>
                </div>
                <div class="mt-6 sm:flex">
                        <button wire:click="refillOrder({{ $singlePrescription->id }})" class="border border-indigo-500 bg-black text-white rounded-md mb-1 px-4 py-2 mx-8 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Request Refill</button>
                </div>
            </div>
        </div>
    </div>

    @endif

    <section>
        <div class="px-4 py-12 mx-auto">
            <div class="max-w-4xl pt-4 mx-auto">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        {{-- <div class="w-full border-t border-black"></div> --}}
                    </div>
                    <div class="relative flex justify-start">
                        <span class="pr-3 text-2xl font-bold text-neutral-600 "> All Prescriptions </span>
                    </div>
                </div>
                @foreach($prescription as $prescriptions)
                <div class="space-y-8 lg:divide-y lg:divide-gray-100">
                    <div class="pt-8 sm:flex lg:items-end group">
                        {{-- <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md lg:h-32 lg:w-32" src="https://images.unsplash.com/photo-1616651181620-9906d6e43fc3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cGF0dGVybnxlbnwwfDJ8MHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="text">
                        </div> --}}
                        <div>
                            <span class="text-sm text-gray-500">{{ $prescriptions->rx_no}}</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                                <button wire:click="viewPrescription({{ $prescriptions->id }})" class="
                      text-xl font-medium text-neutral-600
                      group-hover:text-blue-400
                      lg:text-2xl
                    ">{{ $prescriptions->drug->drug_name }} </button>

                            </p>
                            <p class="mt-2 text-lg text-gray-500"> {{ $prescriptions->dosage }} </p>
                            <p class="mt-2 text-lg text-gray-500"> {{ $prescriptions->directions }} </p>
                            <p class="mt-2 text-lg text-gray-500"> {{ $prescriptions->repeat}} </p>


                        </div>
                    </div>
                        <button wire:click="refillOrder({{ $prescriptions->id }})" class="border border-indigo-500 bg-black text-white rounded-md mb-10 px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Request Refill</button>

                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
