<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($errors) > 0)
                        <div class="bg-red-600 text-white">
                            <strong class="m-4">There were some problems with your input.</strong><br><br>
                            <ul class="m-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="mt-4">
                            <label>Name:</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'block mt-1 w-full')) !!}
                        </div>

                        <div class="mt-4">
                            <label>Email:</label>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'block mt-1 w-full')) !!}
                        </div>

                        <div class="mt-4">
                            <label>Mobile Phone:</label>
                            {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'block mt-1 w-full')) !!}
                        </div>
                        <div class="mt-4">
                            <label>Password:</label>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'block mt-1 w-full')) !!}
                        </div>
                        <div class="mt-4">
                            <label>Confirm Password:</label>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'block mt-1 w-full')) !!}
                        </div>
                        <div class="my-4">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'block mt-1 w-full',)) !!}
                        </div>
                        <div class="my-4">
                            <button type="submit" class="flex-end px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">Submit</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
