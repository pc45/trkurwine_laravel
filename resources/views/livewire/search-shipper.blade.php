<div>
    <div class="px-4 space-y-4 mt-8">
        <form method="post">
            <input class="border-solid border border-gray-300 p-2 w-full md:w-1/4"
                   type="text" placeholder="Search Shippers" wire:model="term"/>
        </form>
        <div wire:loading>Searching shippers...</div>
        <div wire:loading.remove>
            <!--
                notice that $term is available as a public
                variable, even though it's not part of the
                data array
            -->
            @if ($term == "")
                <div class="text-gray-500 text-sm">
                    Enter a term to search for shippers.
                </div>
            @else
                @if($shippers->isEmpty())
                    <div class="text-gray-500 text-sm">
                        No matching shippers were found.
                    </div>
                @else
                    <table class="border-collapse w-full">
                        <thead>
                        <tr>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Shipper name</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">DBA</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Address</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">City</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">State</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shippers as $shipper)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-44 p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Shipper name</span>
                                {{$shipper->ownername}}
                            </td>
                            <td class="w-full lg:w-44 p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">DBA</span>
                                {{$shipper->dba}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                <span class="rounded
                                            bg-{{ strtolower($shipper->status) == 'active' ? 'green' : 'red' }}-400
                                            py-1 px-3 text-xs font-bold">{{$shipper->status}}</span>
                            </td>
                            <td class="w-full lg:w-52 p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Address</span>
                                {{$shipper->addressline1}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">City</span>
                                {{$shipper->city}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">State</span>
                                {{$shipper->state}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                <a href="#" class="text-blue-400 hover:text-blue-600 underline">View</a>
                                <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Edit</a>
                                <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Activity</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>
    <div class="px-4 mt-4">
        {{$shippers->links()}}
    </div>
</div>
