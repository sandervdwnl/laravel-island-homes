<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>All Public Properties</h1>
                </div>

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
            </div>
        </div>

        <div class="main">
            <div class="properties-grid grid grid-cols-3 gap-2 xl:grid-cols-4 p-4 ">
                @foreach ($properties as $property)
                <div class="property-card">
                    <a href="/properties/{{ $property->slug }}">
                        {{-- Display Thumbnail --}}
                        <img src="{{ str_replace ('.jpg', '_thumb.jpg', asset($property->feat_image_path)) }}" alt="{{ ucwords($property->title) }}">
                    </a>
                    <div class="property-details py-2">
                        <p class="text-center font-bold"><a href="/properties/{{ $property->slug }}" class="link">{{ ucwords($property->street) }} {{ $property->number }}</a></p>
                        <p class="text-center font-bold text-gray-500 mb-2">{{ ucwords($property->city) }}, {{ $property->location->name }}</p>
                        <p class="text-center font-bold"><span class="price"></span>USD $ {{ number_format($property->asking_price) }},-</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</x-guest-layout>
