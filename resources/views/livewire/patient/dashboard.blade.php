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
                        <form action="{{ route('patient.dashboard') }}">
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
                "> Cancel </button>
                </form>

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

    
</div>
