<div>
     <button wire:click.prevent="$set('addDoctor', true)" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
         Add Doctor
     </button>


     @if($addDoctor)
      <section class="absolute left-0 top-0 flex justify-center items-center z-10 bg-black bg-opacity-75 w-full h-max py-1">
          <div class="w-full lg:w-6/12 px-4 mt-6">
              <div class="bg-white flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                  <div class="rounded-t bg-white mb-0 px-6 py-6   ">
                      <div class="text-center flex justify-between">
                          <h6 class="text-blueGray-700 text-xl font-bold">
                              Doctor Information
                          </h6>
                          <i wire:click="$set('addDoctor', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                      </div>
                  </div>
                  <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                      <form wire:submit.prevent="createDoctor()">
                          <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                              Doctor Details
                          </h6>

                          <div class="flex flex-wrap">

                              <div class="flex flex-wrap">
                                  <div class="w-full lg:w-12/12 px-4">
                                      <div class="relative w-full mb-3">
                                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                              First Name
                                          </label>
                                          <input wire:model="firstName" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter First Name">
                                          @error('firstName')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                      </div>
                                  </div>

                                  <div class="w-full lg:w-12/12 px-4">
                                      <div class="relative w-full mb-3">
                                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                              Last Name
                                          </label>
                                          <input type="text" wire:model="lastName" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Last Name">
                                          @error('lastName')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                      </div>
                                  </div>

                                  <div class="w-full lg:w-6/12 px-4">
                                      <div class="relative w-full mb-3">
                                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                              Email Address
                                          </label>
                                          <input wire:model="email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Email Address">
                                          @error('email')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                      </div>
                                  </div>

                                  <div class="w-full lg:w-6/12 px-4">
                                      <div class="relative w-full mb-3">
                                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                              License No
                                          </label>
                                          <input wire:model="license" type="text" inputmode="numeric" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter TRN">
                                          @error('license')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                      </div>
                                  </div>

                                  <div class="w-full lg:w-6/12 px-4">
                                      <div class="relative w-full mb-3">
                                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                              Company Name
                                          </label>
                                          <input type="text" wire:model="company" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Town/City">
                                          @error('company')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                      </div>
                                  </div>


                                  <div class="w-full lg:w-12/12 px-4">
                                      <div class="relative w-full mb-3">
                                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                              Work Address
                                          </label>
                                          <input type="text" wire:model="address" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Address">
                                          @error('address')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                      </div>
                                  </div>
                                  <button class="px-10 py-3 bg-blue-600 mt-2 ml-4 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Add</button>
                              </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
     @endif
     @if($doctorEdit)
     <section
          class="absolute left-0 top-0 flex justify-center items-center z-10 bg-black bg-opacity-75 w-full h-max py-1">
          <div class="w-full lg:w-6/12 px-4 mt-6">
               <div
                    class="bg-white flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6   ">
                         <div class="text-center flex justify-between">
                              <h6 class="text-blueGray-700 text-xl font-bold">
                                   Doctor Information
                              </h6>
                              <i wire:click="$set('doctorEdit', false)"
                                   class="fas fa-times text-2xl cursor-pointer"></i>
                         </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                         <form wire:submit.prevent="updateDoctor()">
                              <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                  Doctor Details
                              </h6>

                              <div class="flex flex-wrap">

                                   <div class="flex flex-wrap">
                                        <div class="w-full lg:w-12/12 px-4">
                                             <div class="relative w-full mb-3">
                                                  <label
                                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                       htmlfor="grid-password">
                                                       First Name
                                                  </label>
                                                  <input wire:model="firstName" type="text"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                       placeholder="Enter First Name">
                                                  @error('firstName')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                             </div>
                                        </div>

                                        <div class="w-full lg:w-12/12 px-4">
                                             <div class="relative w-full mb-3">
                                                  <label
                                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                       htmlfor="grid-password">
                                                       Last Name
                                                  </label>
                                                  <input type="text" wire:model="lastName"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                       placeholder="Enter Last Name">
                                                  @error('lastName')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                             </div>
                                        </div>

                                        <div class="w-full lg:w-6/12 px-4">
                                             <div class="relative w-full mb-3">
                                                  <label
                                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                       htmlfor="grid-password">
                                                       Email Address
                                                  </label>
                                                  <input wire:model="email" type="email"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                       placeholder="Enter Email Address">
                                                  @error('email')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                             </div>
                                        </div>

                                        <div class="w-full lg:w-6/12 px-4">
                                             <div class="relative w-full mb-3">
                                                  <label
                                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                       htmlfor="grid-password">
                                                       License No
                                                  </label>
                                                  <input wire:model="license" type="text" inputmode="numeric"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                       placeholder="Enter TRN">
                                                  @error('license')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                             </div>
                                        </div>

                                        <div class="w-full lg:w-6/12 px-4">
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                                    Company Name
                                                </label>
                                                <input type="text" wire:model="company" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Enter Town/City">
                                                @error('company')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                            </div>
                                        </div>


                                        <div class="w-full lg:w-12/12 px-4">
                                             <div class="relative w-full mb-3">
                                                  <label
                                                       class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                       htmlfor="grid-password">
                                                     Work Address
                                                  </label>
                                                  <input type="text" wire:model="address"
                                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                       placeholder="Enter Address">
                                                  @error('address')<span class="text-xs text-red-600">{{
                                                       $message }}</span>@enderror
                                             </div>
                                        </div>
                                        <button
                                             class="px-10 py-3 bg-blue-600 mt-2 ml-4 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Update</button>
                                   </div>
                         </form>
                    </div>
               </div>
          </div>
     </section>


     @endif

     <section class="text-gray-600 body-font overflow-hidden">
          <div class="container px-5 py-20 mx-auto">
               <div class="-my-8 divide-y-2 divide-gray-100">
                    @foreach($doctor as $doctors)
                    <div class="py-6 flex flex-wrap md:flex-nowrap">
                         <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                              <span class="font-semibold title-font text-gray-700">{{ $doctors->user->user_type
                                   }}</span>
                              <span class="mt-1 text-gray-500 text-sm">{{ $doctors->license_no }}</span>
                         </div>
                         <div class="md:flex-grow">
                              <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $doctors->user->fname }}
                                   {{ $doctors->user->lname }}</h2>
                              <p class="leading-relaxed"><span class="font-medium"> Company Name: </span>{{
                                   $doctors->work_name }}</p>
                              <p class="leading-relaxed"><span class="font-medium">Company Address: </span>{{
                                   $doctors->work_address }}</p>
                              <button wire:click.prevent="editDoctor({{ $doctors->id }})" type="button"
                                   class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                   Edit 
                              </button>
                              <button wire:click.prevent="deleteDoctor({{ $doctors->id }})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                  Delete
                              </button>


                         </div>
                    </div>
                    @endforeach
               </div>
          </div>
          {{ $doctor->links() }}
     </section>

</div>