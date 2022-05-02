<div>
    <button wire:click.prevent="$set('addPrescription', true)" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
        New Prescription
    </button>

    @if($addPrescription)
    <section class="absolute left-0 top-0 flex justify-center items-center z-10 transition-opacity bg-black bg-opacity-80 w-full h-full">


        <div class="w-full lg:w-6/12 px-4 mt-6">
            <div class="bg-white w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6   ">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Prescription Information
                        </h6>
                        <i wire:click="$set('addPrescription', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                    <form wire:submit.prevent="createPrescription()">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Prescription Details
                        </h6>

                        <div>
                            <div>
                                <div class="w-full">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Patient Name</label>
                                        <select wire:model="patientName"  type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter First Name">
                                            <option value="">Select...</option>
                                            @foreach($people as $person)

                                            <option value="{{$person['id']}}"> {{$person['user']['fname']}} {{$person['user']['lname'] }}</option>

                                            @endforeach
                                        </select>
                                        @error('patientName')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror

                                    </div>

                                    <div class="w-full">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Drug
                                            </label>
                                            <select wire:model="drug"  type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter First Name">
                                                <option value="">Select...</option>
                                                @foreach($pdrugs as $pdrugs)
                                                <option value="{{$pdrugs['id']}}"> {{$pdrugs['drug_name']}}</option>
                                                @endforeach 
                                            </select>
                                                @error('drug')<span class="text-xs text-red-600">{{$message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Directions
                                            </label>
                                            <input type="text" wire:model="directions" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Directions">
                                                @error('directions')<span class="text-xs text-red-600">{{$message }}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="flex gap-4 mb-4">
                                        <div class="w-1/2">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Dosage
                                            </label>
                                            <input wire:model="dosage" type="text"  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter TRN">
                                            @error('dosage')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                        </div>

                                        <div class="w-1/2">

                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Duration
                                            </label>
                                            <input type="text" wire:model="duration" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Address">
                                            @error('duration')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror

                                        </div>

                                    </div>

                                    <div class="flex gap-4 mb-4">
                                        <div class="w-1/2">

                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Repeat
                                            </label>
                                            <input wire:model="repeat" type="text" inputmode="numeric" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter TRN">
                                            @error('repeat')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror


                                        </div>

                                        <div class="w-1/2">

                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Quantity
                                            </label>
                                            <input type="text" wire:model="quantity" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Address">
                                            @error('quantity')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror

                                        </div>

                                    </div>


                                    <button type="submit" class="px-10 py-3 bg-blue-600 mt-2 ml-4 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endif

    @if($prescriptionEdit)
    <section class="absolute left-0 top-0 flex justify-center items-center z-10 transition-opacity bg-black bg-opacity-80 w-full h-full">


        <div class="w-full lg:w-6/12 px-4 mt-6">
            <div class="bg-white w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6   ">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Prescription Information
                        </h6>
                        <i wire:click="$set('prescriptionEdit', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                    <form wire:submit.prevent="updatePrescription()">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Prescription Details
                        </h6>

                        <div>
                            <div>
                                <div class="w-full">
                                    <div class="relative w-full mb-3">
                                        <input type="hidden" wire:model="rxNo">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Patient Name</label>
                                        <select wire:model="patient" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter First Name">
                                            <option value="">Select...</option>
                                            @foreach($people as $person)

                                            <option value="{{$person['id']}}"> {{$person['user']['fname']}} {{$person['user']['lname'] }}</option>

                                            @endforeach
                                        </select>
                                        @error('patient')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror

                                    </div>

                                    <div class="w-full">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Drug
                                            </label>
                                            <select wire:model="drugs" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter First Name">
                                                <option value="">Select...</option>
                                                @foreach($pdrugs as $pdrugs)
                                                <option value="{{$pdrugs['id']}}"> {{$pdrugs['drug_name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('drugs')<span class="text-xs text-red-600">{{$message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="relative w-full mb-3">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Directions
                                            </label>
                                            <input type="text" wire:model="direction" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Directions">
                                            @error('direction')<span class="text-xs text-red-600">{{$message }}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="flex gap-4 mb-4">
                                        <div class="w-1/2">
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Dosage
                                            </label>
                                            <input wire:model="pdosage" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter TRN">
                                            @error('pdosage')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                        </div>

                                        <div class="w-1/2">

                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Duration
                                            </label>
                                            <input type="text" wire:model="pduration" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Address">
                                            @error('pduration')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror

                                        </div>

                                    </div>

                                    <div class="flex gap-4 mb-4">
                                        <div class="w-1/2">

                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Repeat
                                            </label>
                                            <input wire:model="prepeat" type="text" inputmode="numeric" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter TRN">
                                            @error('prepeat')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror


                                        </div>

                                        <div class="w-1/2">

                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                Quantity
                                            </label>
                                            <input type="text" wire:model="pquantity" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Address">
                                            @error('pquantity')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror

                                        </div>

                                    </div>


                                    <button type="submit" class="px-10 py-3 bg-blue-600 mt-2 ml-4 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

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
                            <p class="leading-relaxed text-base"><span class="font-medium"> Dosage: </span>{{ $prescription->dosage}}</p>
                            <p class="leading-relaxed text-base"><span class="font-medium">Directions :</span>{{ $prescription->directions}}</p>
                            <button wire:click.prevent="viewPrescription({{ $prescription->id }})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                View
                            </button>
                            <button wire:click.prevent="editPrescription({{ $prescription->id }})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                Edit
                            </button>
                            <button wire:click.prevent="deletePrescription({{ $prescription->id }})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                Delete
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
