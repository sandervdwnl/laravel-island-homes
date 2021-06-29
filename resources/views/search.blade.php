<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="search flex justify-center items-center my-8">
                    <form action="{{ route('search') }}" method="GET">
                        {{-- Location --}}
                        <label for="Location">Location</label>
                        <select name="location-filter" class="mx-2">
                            @foreach($locations as $location)
                            <option value="{{ $location->id }}" @if(isset($selected_location) && $location->id == $selected_location->id)
                                selected
                                @endif
                                >{{ $location->name }}
                            </option>
                            @endforeach
                        </select>
                        {{-- Bedrooms --}}
                        <label for="Bedrooms">Min Bedrooms</label>
                        <select name="bedrooms-filter" class="mx-2">
                            @for($i = 1; $i < $max_bedrooms->bedrooms + 1; $i++)
                                <option value="{{ $i }}" @if(isset($selected_min_bedrooms) && $i==$selected_min_bedrooms) selected @endif>{{ $i }}</option>
                                @endfor
                        </select>
                        {{-- Bedrooms --}}
                        <label for="Bathrooms">Min Bathrooms</label>
                        <select name="bathrooms-filter" class="mx-2">
                            @for($i = 1; $i < $max_bathrooms->bathrooms + 1; $i++)
                                <option value="{{ $i }}" @if(isset($selected_min_bathrooms) && $i==$selected_min_bathrooms) selected @endif>{{ $i }}</option>
                                @endfor
                        </select>

                        <input type="submit" value="Search" class="py-2 px-4 bg-blue-500 font-bold text-white rounded shadow ml-6">
                    </form>
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

        @if(isset($selected_location))
        <h1 class="text-center text-xl xl:text-2xl my-6">Properties in <b>{{ $selected_location->name }}</b></h1>
        @endif

        <div class="main">
            @if(count($properties) > 0)
            <div class="properties-grid grid grid-cols-2 gap-2 xl:grid-cols-4 p-4 max-w-7xl mx-auto"">
                @foreach ($properties as $property)
                <div class=" property-card">
                <a href="/properties/{{ $property->slug }}">
                    <h3 class="text-center font-bold text-xl mb-4 truncate">{{ $property->title }}</h3>
                    {{-- Display Thumbnail --}}
                    <img src="{{ str_replace ('.jpg', '_thumb.jpg', asset($property->feat_image_path)) }}" alt="{{ ucwords($property->title) }}">
                </a>
                <div class="property-details py-2">
                    <div class="main-details flex mb-4 font-bold">
                        @if($property->status == 'For Sale')
                        <div class="bg-green-400 text-white capitalize py-1 px-4 mr-4">For Sale</div>
                        @elseif($property->status == 'Pending')
                        <div class="bg-yellow-500 text-white capitalize py-1 px-4 mr-4">Pending</div>
                        @else
                        <div class="bg-red-400 text-white capitalize py-1 px-4 mr-4">Sold</div>
                        @endif
                        <p class="text-center py-1 px-4">{{ ucwords($property->street) }} {{ $property->number
                                }}</a></p>
                    </div>
                    <p class="text-center font-bold text-gray-500 mb-2">{{ ucwords($property->city) }}, {{
                            $property->location->name }}</p>
                    <p class="text-center font-bold"><span class="price"></span>USD &#36; {{
                            number_format($property->asking_price) }},-</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h2 class="text-center font-bold text-blue-400 text-xl mt-8">Sorry....Nothing found....</h2>
        @endif
    </div>

    </div>
</x-guest-layout>
