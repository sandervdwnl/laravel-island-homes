<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container my-4 pb-2">

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

                        @if (!empty($properties))

                        <table class="shadow-lg bg-white mx-auto w-full">
                            <tr>
                                <th class="bg-yellow-100 border text-left px-8 py-4">ID</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Title</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Approval</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Status FSL/SOLD/PEN</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Featured</th>
                                <th class="bg-yellow-100 border text-left px-8 py-4">Delete</th>

                            </tr>
                            @foreach ($properties as $property)
                            <tr>
                                <td class="border px-8 py-4">{{ $property->id }}</td>
                                <td class="border px-8 py-4">{{ $property->title }}</td>
                                <td class="border px-8 py-4 text-center">
                                    <form action="/admin/properties/{{ $property->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input onChange="this.form.submit()" type="checkbox" id="approved" name="approved" value="{{ $property->approved }}" {{ $property->approved == 1 ? 'checked' : '' }}>
                                    </form>
                                </td>
                                <td class="border px-8 py-4">
                                    <form action="/admin/properties/{{ $property->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select onChange="this.form.submit()" name="status" id="status">
                                            <option value="For Sale" {{ $property->status == 'For Sale' ? 'selected' : '' }}>For Sale</option>
                                            <option value="Pending" {{ $property->status == 'Pending' ? 'selected' : ''}}>Pending</option>
                                            <option value="Sold" {{ $property->status == 'Sold' ? 'selected' : ''}}>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="border px-8 py-4 text-center">
                                    <form action="/admin/properties/{{ $property->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input onChange="this.form.submit()" type="checkbox" id="featured" name="featured" value="{{ $property->is_featured }}" {{ $property->is_featured== 1 ? 'checked' : '' }}>
                                    </form>
                                </td>
                                <td class="border px-8 py-4 text-red-500">
                                    <form action="/admin/properties/{{ $property->id }}" method="post">
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
    </div>
</x-app-layout>
