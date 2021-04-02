<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Process a new list of permittees for Iowa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($message = Session::get('success'))
                        <div class="bg-green-400 text-white m-4 p-8" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                    @endif
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
                    {!! Session::forget('success') !!}
                    <br />
                    <!---<a href="{{ route('exportExcel', 'xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                    <a href="{{ route('exportExcel', 'xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                    <a href="{{ route('exportExcel', 'csv') }}"><button class="btn btn-success">Download CSV</button></a> --->
                    <form action="{{ route('importExcel') }}" class="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mt-4">
                            <label class="block mt-2 mb-6 font-bold">Upload Permittees CSV File (<a href="/sample-permittees.csv" target="_blank" download="" class="text-blue-300 hover:underline">Sample File</a>)</label>
                            <input class="block mt-1" type="file" name="import_file" />

                        <button class="block mt-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Import File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
