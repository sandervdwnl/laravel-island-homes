<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(isset($message))
            <div class="py-4 bg-green-200 text-bold font-lg text-center">
                {{ $message }}
            </div>
            @endif

            @if (session('success'))
            <div class="py-4 bg-green-200 text-bold font-lg text-center">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>My Properties</p>
                    <div class="py-2 px-4 bg-green-300 hover:bg-green-200 border-b border-gray-200 w-2/12 mt-4">
                        <a href="/properties/create">Add A Property:</a>
                    </div>

                    <div class="container my-4 pb-2">

                        @if (!empty($properties))

                        <table class="shadow-lg bg-white mx-auto w-full">
                            <tr>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Title</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Show</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Edit</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Delete</th>

                            </tr>
                            @foreach ($properties as $property)
                            <tr>
                                <td class="border px-8 py-4">{{ $property->title }}</td>
                                <td class="border px-8 py-4 text-green-500"><a href="/properties/{{ $property->slug }}">Show</a></td>
                                <td class="border px-8 py-4 text-blue-500"><a href="/properties/{{ $property->id }}/edit">Edit</a></td>
                                <td class="border px-8 py-4 text-red-500">
                                    <form action="/properties/{{ $property->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="bg-white cursor-pointer px-2 py-1 block" onclick="return confirm('Are you sure you want to delete this property')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </table>

                        @else
                        <p class="text-center p-4">It looks empty in here..</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
