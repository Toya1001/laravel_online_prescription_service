<div>
     @if (session()->has('message'))
     <div class="alert alert-success">
         {{ session('message') }}
     </div>
     @endif

    <!-- component -->
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Patient Name</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">RX No</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Drug Name</th>
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
                    {{ $order->prescription->rx_no }}
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Drug Name</span>
                    {{ $order->prescription->drug->drug_name }}
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
