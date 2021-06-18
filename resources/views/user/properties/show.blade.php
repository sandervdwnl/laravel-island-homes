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
                    <h1 class="font-bold text-2xl text-center">{{ $property->title }}</h1>
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

                {{-- Featured Image --}}

                <div class="featured_image w-full mb-4">
                    <img src="{{ asset($property->feat_image_path) }}" alt="{{ $property->title }}">
                </div>

                <div class="my-4 flex">
                    <p class="text-2xl font-bold mr-4">Status: <span class="font-normal">{{ $property->status }}</span></p>
                    <p class="text-2xl font-bold">Price: <span class="font-normal">USD $ {{ number_format($property->asking_price) }},- </span></p>
                </div>

                {{-- Photo Gallery --}}

                <div class="gallery w-full flex mb-8">
                    @foreach ($property->images as $image)


                    {{-- Lightbox --}}

                    @if ($image->size == 'full')
                    <a href="{{ asset($image->image_path) }}" data-lightbox="$property->title" class="w-1/4 xl:w-1/5">
                        <img src="{{ asset($image->image_path) }}" alt="{{ $property->title }} Image">
                    </a>
                    @endif

                    @endforeach
                </div>

                {{-- Description --}}

                <div class="description mb-4">
                    <h2 class="text-center text-2xl font-bold my-6">Description</h2>
                    {!! $property->description !!}
                </div>

                {{-- Details --}}

                <h2 class="text-center text-2xl font-bold my-6">Details</h2>

                <div class="details flex flex-wrap w-full mx-auto text-base">
                    <div class="w-1/2 mb-2"><span>Property Type:</span></div>
                    <div class="w-1/2 mb-2"><span>{{ $property->property_type }}</span></div>
                    <div class="w-1/2 mb-2"><span>Built In:</span></div>
                    <div class="w-1/2 mb-2"><span>{{ $property->built_in }}</span></div>
                    <div class="w-1/2 mb-2"><span>Indoor Area Size:</span></div>
                    <div class="w-1/2 mb-2"><span>{{ $property->area_size_indoor }}</span></div>
                    <div class="w-1/2 mb-2"><span>Outdoor Area Size:</span></div>
                    <div class="w-1/2 mb-2"><span>{{ $property->area_size_outdoor }}</span></div>
                    <div class="w-1/2 mb-2"><span>Bedrooms:</span></div>
                    <div class="w-1/2 mb-2"><span>{{ $property->bedrooms }}</span></div>
                    <div class="w-1/2 mb-2"><span>Bathrooms:</span></div>
                    <div class="w-1/2 mb-2"><span>{{ $property->bathrooms }}</span></div>
                </div>

                {{-- Location --}}

                <h2 class="text-center text-2xl font-bold my-6">Location</h2>

                <p class="text-gray-700 mb-4"><b>{{ ucwords($property->street) }} {{ $property->number }}</b> In <b>{{ ucwords($property->city) }}, {{ $property->location->name }}</b></p>

                <div>
                    {{-- Embedded OSM Map with manipulated URL --}}
                    {{-- Parameters for bbox: bbox = min Longitude , min Latitude , max Longitude , max Latitude  --}}
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox={{ $property->longitude - .003 }}%2C{{ $property->latitude - .003 }}%2C{{ $property->longitude - + .003 }}%2C{{ $property->latitude + .003 }}&amp;layer=mapnik&amp;marker={{ $property->latitude }}%2C{{ $property->longitude}}" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/?mlat={{ $property->latitude }}&amp;mlon={{ $property->longitude }}#map=13/12.1676/-68.2732">Grotere kaart bekijken</a></small>

                </div>




            </div>

        </div>
    </div>



</x-guest-layout>
