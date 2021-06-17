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
                    <h1>Single Property</h1>
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

            <div class="container w-full">
                <h2 class="text-center text-2xl font-bold">{{ $property->title }}</h2>

                <div class="description mb-4">
                    {!! $property->description !!}
                </div>

                <h3 class="text-xl font-bold mb-2">Address:</h3>
                <p class="text-gray-700"><b>{{ $property->street }} {{ $property->number }}</b> In <b>{{ $property->city }}, {{ $property->location->name }}</b></p>

                <h3 class="text-xl font-bold my-4">Map</h3>

                <div>
                    {{-- Embedded OSM Map with manipulated URL --}}
                    {{-- Parameters for bbox: bbox = min Longitude , min Latitude , max Longitude , max Latitude  --}}
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox={{ $property->longitude - .001}}%2C{{ $property->latitude - .001}}%2C{{ $property->longitude - + .001 }}%2C{{ $property->latitude + .001 }}&amp;layer=mapnik&amp;marker={{ $property->latitude }}%2C{{ $property->longitude}}" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/?mlat={{ $property->latitude }}&amp;mlon={{ $property->longitude }}#map=13/12.1676/-68.2732">Grotere kaart bekijken</a></small>

                </div>

            </div>

        </div>
    </div>



</x-guest-layout>
