<div>
     @if($history)
     <section class="absolute left-0 top-0 flex justify-center items-center z-10 bg-black bg-opacity-75 w-full h-screen py-1">
         <div class="w-full lg:w-6/12 px-4 mt-6">
             <div class="bg-white flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                 <div class="rounded-t bg-white mb-0 px-6 py-6   ">
                     <div class="text-center flex justify-between">
                         <h6 class="text-blueGray-700 text-xl font-bold">
                             Patient Medical History
                         </h6>
                         <i wire:click="$set('history', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                     </div>
                 </div>
                 <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                     <form wire:submit.prevent="updateMedicalHistory()">
                         <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                             Patient Details
                         </h6>

                         <div class="flex flex-wrap">

                             <div class="flex flex-wrap">
                                 <div class="w-full lg:w-12/12 px-4">
                                     <div class="relative w-full mb-3">
                                         <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                             Allergies
                                         </label>
                                         <input wire:model="allergies" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Allergies">
                                         @error('allergies')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                     </div>
                                 </div>

                                 <div class="w-full lg:w-12/12 px-4">
                                     <div class="relative w-full mb-3">
                                         <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                             Illnesses
                                         </label>
                                         <input type="text" wire:model="illness" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Illness">
                                         @error('illness')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                     </div>
                                 </div>

                                 <div class="w-full lg:w-6/12 px-4">
                                     <div class="relative w-full mb-3">
                                         <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                             Pregnant/Nursing
                                         </label>
                                         <select wire:model="pregnant" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Email Address">
                                             <option value="">Select...</option>
                                             <option value="1">Yes</option>
                                             <option value="0">No</option>
                                         </select>
                                         @error('pregnant')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                     </div>
                                 </div>


                                 <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Update</button>
                             </div>
                     </form>
                 </div>
             </div>
         </div>
     </section>
     @endif

     <section class="text-gray-600 body-font overflow-hidden">
         <div class="container px-5 py-24 mx-auto">
             <div class="-my-8 divide-y-2 divide-gray-100">
                 @foreach ($patient as $patient)
                 <div class="py-8 flex flex-wrap md:flex-nowrap">
                     <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                         <span class="font-semibold title-font text-gray-700">CATEGORY</span>
                         <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                     </div>
                     <div class="md:flex-grow">
                         <h2 class="text-xl font-medium text-gray-900 title-font mb-2">{{ $patient['user']['fname'] }} {{
                            $patient['user']['lname'] }}</h2>

                         <p class="leading-relaxed"><span class="font-medium"><span>Address: </span>{{
                                $patient['address'] }}</span>

                             {{ $patient['city'] }}, {{ $patient['parish'] }} </p>
                         <p class="leading-relaxed"><span>Email Address: </span> {{ $patient['user']['email'] }}</p>
                         <p class="leading-relaxed"><span>Contact No.: </span>{{ $patient['tel_no'] }}</p>

                         <button wire:click="medicalHistory({{ $patient['medical_history']['id']?? 0}})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                             Medical History
                         </button>

                         

                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </section>


</div>
