<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Existing Users') }}
            </h2>

            <div class="float-right p-2 bg-gray-400 rounded-xl text-white">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="inline">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <a class="" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @if ($message = Session::get('success'))
                            <div class="bg-green-400 text-white m-4 p-8">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="min-w-full table-auto">
                            <thead class="justify-between">
                            <tr class="bg-gray-800">
                                <th class="px-16 py-2">
                                    <span class="text-gray-300">Name</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-300">Email</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-300">Mobile</span>
                                </th>

                                <th class="px-16 py-2">
                                    <span class="text-gray-300">User Type</span>
                                </th>

                                <th class="px-16 py-2">
                                    <span class="text-gray-300">Action</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-gray-200">

                            @foreach ($users as $key => $user)
                            <tr class="bg-white border-4 border-gray-200">
                                <td>
                                    <span class="text-center ml-2 font-semibold">{{ $user->name }}</span>
                                </td>
                                <td class="px-16 py-2">
                                    {{ $user->email }}
                                </td>
                                <td class="px-16 py-2">
                                    <span>{{ $user->mobile }}</span>
                                </td>
                                <td class="px-16 py-2">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $role)
                                            <span>{{ $role }}</span>
                                        @endforeach
                                    @endif
                                </td>

                                <td class="flex px-16 py-2">
                                    <a href="{{ route('users.edit',$user->id) }}">
                                        <button class="bg-yellow-300 text-white px-4 py-2 border-yellow-500 rounded-md hover:bg-yellow-200 hover:border-yellow-800 hover:text-black mr-4">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'bg-red-600 text-white px-4 py-2 border-red-900 rounded-md hover:bg-red-200 hover:border-red-900 hover:text-black ']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div>
                            <div class="my-8">
                                {{$users->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
