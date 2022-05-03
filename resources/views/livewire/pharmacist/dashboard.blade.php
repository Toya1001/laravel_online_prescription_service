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

                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $patients }}</h2>
                        <p class="leading-relaxed">Patients</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z" /></svg>

                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $orders }}</h2>
                        <p class="leading-relaxed">Orders</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368zM448 303.1C448 295.2 440.8 287.1 432 287.1C423.2 287.1 416 295.2 416 303.1V351.1H368C359.2 351.1 352 359.2 352 367.1C352 376.8 359.2 383.1 368 383.1H416V431.1C416 440.8 423.2 447.1 432 447.1C440.8 447.1 448 440.8 448 431.1V383.1H496C504.8 383.1 512 376.8 512 367.1C512 359.2 504.8 351.1 496 351.1H448V303.1z" /></svg>

                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $prescriptions }}</h2>
                        <p class="leading-relaxed">Prescription</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-1/2">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg class="text-indigo-500 w-12 h-12 mb-3 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M176 240H128v32h48C184.9 272 192 264.9 192 256S184.9 240 176 240zM256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM292.5 315.5l11.38 11.25c6.25 6.25 6.25 16.38 0 22.62l-29.88 30L304 409.4c6.25 6.25 6.25 16.38 0 22.62l-11.25 11.38c-6.25 6.25-16.5 6.25-22.75 0L240 413.3l-30 30c-6.249 6.25-16.48 6.266-22.73 .0156L176 432c-6.25-6.25-6.25-16.38 0-22.62l29.1-30.12L146.8 320H128l.0078 48.01c0 8.875-7.125 16-16 16L96 384c-8.875 0-16-7.125-16-16v-160C80 199.1 87.13 192 96 192h80c35.38 0 64 28.62 64 64c0 24.25-13.62 45-33.5 55.88L240 345.4l29.88-29.88C276.1 309.3 286.3 309.3 292.5 315.5z" /></svg>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{ $drugs }}</h2>
                        <p class="leading-relaxed">Drugs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

