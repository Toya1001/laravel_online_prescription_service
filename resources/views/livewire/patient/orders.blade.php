<div>
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
                @foreach($orders as $prescriptions)
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
