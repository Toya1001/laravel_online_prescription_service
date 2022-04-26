<div>
   <section class="text-gray-600 body-font overflow-hidden">
       <div class="container px-5 py-24 mx-auto">
           <div class="-my-8 divide-y-2 divide-gray-100">
               @foreach($prescription as $prescriptions)
               <div class="py-8 flex flex-wrap md:flex-nowrap">
                   <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                       <span class="font-semibold title-font text-gray-700">{{ $prescriptions->patient->user->fname }} {{ $prescriptions->patient->user->lname }}</span>

                       <span class="mt-1 text-gray-500 text-sm">{{ $prescriptions->patient->mx_no }}</span>
                   </div>
                   <div class="md:flex-grow">
                       <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $prescriptions->drug->drug_name }}</h2>
                       <p class="leading-relaxed"><span class="font-medium">Dosage: </span>{{ $prescriptions->dosage }}</p>
                       <p class="leading-relaxed"><span class="font-medium">Directions: </span>{{ $prescriptions->directions }}</p>
                       <button wire:click.prevent="viewPrescription({{ $prescriptions->id }})" type="button" class="border border-indigo-500 bg-black text-white rounded-md px-4 py-2 mx-2 mt-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                           View Prescription
                       </button>

                   </div>
               </div> 
                @endforeach
           </div>
       </div>
       {{ $prescription->links() }}
   </section>

</div>
