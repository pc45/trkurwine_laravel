<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detailed Shipper Report') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.user')
                    <div class="shipper-details">
                        <h3>Master Details</h3>
                        <div class="flex">
                            <div class="font-bold"><p><strong>Name:</strong></p></div>
                            <div class="ml-2"><p>{{$shippers->ownername}}</p></div>
                        </div>
                        <div class="flex">
                            <div class="font-bold">DBA:</div>
                            <div class="ml-2">{{$shippers->dba}}</div>
                        </div>
                        <div class="flex">
                            <div class="block font-bold"><p>Contact:</p></div>
                            <div class="ml-4">
                                <ul class="flex flex row">
                                    <li >{{$shippers->contactname}}</li>
                                    <li class="ml-2">{{$shippers->emailaddress}}</li>
                                    <li class="ml-2">{{$shippers->contactphone}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4"><p><strong>Mailing Address:</strong></p></div>
                            <div class="col-sm-8">
                                <ul class="list-inline">
                                    <li></li>
                                    <li>,  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
