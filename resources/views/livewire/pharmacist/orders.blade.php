<div>
        @if (session()->has('message'))

        <div x-data="{show:true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="w-full text-white bg-blue-500">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                    </svg>

                    <p class="mx-3"> {{ session('message') }}</p>
                </div>

                <button class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
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
                    
                </div>
            </div>
        </div>

        @endif



    <!-- component -->
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Patient Name</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">RX No</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Drug Name</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Patient name</span>
                   {{ $order->patient->user->lname }}, {{ $order->patient->user->fname }}
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Rx No</span>
                    <button wire:click="viewPrescription({{ $order->prescription->id }})">{{ $order->prescription->rx_no }}</button>

                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Drug Name</span>
                    {{ $order->prescription->drug->drug_name }}
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                    {{ $order->status }}
                </td>

                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                    <button wire:click="updateOrder({{ $order->id }})" class="text-blue-400 hover:text-blue-600 underline">Fulfilled</button>
                    <button wire:click="pickUpOrder({{ $order->id }})" class="text-blue-400 hover:text-blue-600 underline pl-6">Ready for Pick Up</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
