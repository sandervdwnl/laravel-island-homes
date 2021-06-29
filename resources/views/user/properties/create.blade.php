<x-guest-layout>

    @section('tinymce')
    <script src="https://cdn.tiny.cloud/1/izqu9favecmjvbbfp1dhe96fphutb1stn4aqs7363k6j8trm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description'
        });

    </script>
    @stop
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl px-12 font-bold w-full my-4">Add Property<span class="text-sm ml-2 text-red-500 italic">* is required</span></h1>


                    <div class="container my-4 xl:text-lg text-center">

                        <div class="w-full mx-auto">

                            @if ($errors->any())
                            <div class="alert bg-red-300 py-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif



                            {{-- Add Porperty Form --}}

                            <form action="../properties" method="post" enctype="multipart/form-data" id="create_property_form" class="bg-white shadow-md rounded mb-4 xl:mb-8 w-full">
                                @csrf
                                <h2 class="text-center text-xl font-bold w-full my-4">General Information</h2>

                                {{-- Title --}}
                                <div class="form-wrapper w-full flex flex-wrap px-8">
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="title">
                                            Property Title*
                                        </label>
                                        <input class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title of the property" name="title" value="{{ old('title') }}" minlength="10" maxlength="50" required>
                                    </div>
                                    {{-- Asking Price --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="asking_price">
                                            Asking Price*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="asking_price" name="asking_price" type="number" placeholder="Price in &#36; USD" value="{{ old('asking_price') }}" min="10000" max="1000000000" step="1" required>
                                        <p class="text-left text-indigo-500"><small>Please enter a price without
                                                decimals</small></p>
                                    </div>

                                    <h2 class="text-center text-xl font-bold w-full my-4">Adress</h2>
                                    {{-- Street --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-2/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="street">
                                            Street*
                                        </label>
                                        <input class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="street" name="street" type="text" placeholder="Name of the street" value="{{ old('street') }}" minlength="3" required>
                                    </div>
                                    {{-- Number --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="number">
                                            Number*
                                        </label>
                                        <input class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="number" name="number" type="text" placeholder="Appt/house number" value="{{ old('number') }}" required>
                                    </div>
                                    {{-- Zip Code --}}
                                    <div class="mb-4 xl:mb-8  w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="zip_code">
                                            Zip Code
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="zip_code" name="zip_code" type="text" placeholder="Zip / Postal code" value="{{ old('zip_code') }}">
                                    </div>
                                    {{-- City --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="city">
                                            City*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="city" name="city" type="text" placeholder="eg. 'New Tork'" value="{{ old('city') }}" minlength="3" required>
                                    </div>
                                    {{-- Location --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="location">
                                            Location*
                                        </label>
                                        <select name="location_id" id="location_id" class="w-full">
                                            @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location-> name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Coördinates --}}

                                    <h2 class="text-center text-xl font-bold w-full my-4">Position<span class="text-sm ml-2 text-gray-500">Get coördinates with <a href="https://www.google.com/maps" target="_blank" class="text-blue-500">Google Maps</a> or <a href="https://www.latlong.net/" target="_blank" class="text-blue-500">Latlong</a> </span></h2>

                                    {{-- Latitude --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="latitude">
                                            Latitude*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="latitude" name="latitude" min="11.979144" max="18.145982" step="0.000001" type="number" placeholder="eg. 12.123456" value="{{ old('latitude') }}" required>
                                    </div>
                                    {{-- Longitude --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="longitude">
                                            Longitude*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="longitude" name="longitude" min="-68.440281" max="-62.966999" step="0.000001" type="number" placeholder="eg. -64.123456" value="{{ old('longitude') }}" required>
                                    </div>

                                    {{-- Details --}}

                                    <h2 class="text-center text-xl font-bold w-full my-4">Property Details</h2>

                                    {{-- Built Year --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="built_in">
                                            Built in Year*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="built_in" name="built_in" min="1900" step="1" type="number" placeholder="YYYY" value="{{ old('built_in') }}" maxlength="4" required>
                                    </div>
                                    {{-- Indoor Area --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="area_size_indoor">
                                            Indoor Area Size*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="area_size_indoor" name="area_size_indoor" type="number" placeholder="Size in sqm (m2)" step="1" value="{{ old('area_size_indoor') }}" min="5" required>
                                        <p class="text-left text-indigo-500"><small>1 sqft = 0.09290304 sqm</small></p>
                                    </div>
                                    {{-- Outdoor Area --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="area_size_outdoor">
                                            Outdoor Area Size*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="area_size_outdoor" name="area_size_outdoor" type="number" placeholder="Size in sqm (m2)" step="1" value="{{ old('area_size_outdoor') }}" min="5" required>
                                        <p class="text-left text-indigo-500"><small>1 sqft = 0.09290304 sqm</small></p>
                                    </div>
                                    {{-- Bedrooms --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="bedrooms">
                                            Bedrooms*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="bedrooms" name="bedrooms" type="number" step="1" min="1" value="{{ old('bedrooms') }}" required>
                                    </div>
                                    {{-- Bathrooms --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="bathrooms">
                                            Bathrooms*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="bathrooms" name="bathrooms" type="number" step="1" min="1" value="{{ old('bathrooms') }}" required>
                                    </div>
                                    {{-- Property Type --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="property_type">
                                            Property Type*
                                        </label>
                                        <select name="property_type" id="property_type" class="w-full">
                                            <option value="Villa">Villa</option>
                                            <option value="Chalet">Chalet</option>
                                            <option value="Appartment">Appartment</option>
                                            <option value="Condo">Condo</option>
                                            <option value="Lot">Lot</option>
                                            <option value="Penthouse">Penthouse</option>
                                        </select>
                                    </div>
                                    {{-- Desciption --}}
                                    <div class="mb-4 xl:mb-8 w-full">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="description">
                                            Description*
                                        </label>
                                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="description" minlength="100" name="description">
                                        {{ old('description') }}
                                        </textarea>
                                        <p class="text-left text-indigo-500"><small>Min 100 characters</small></p>
                                    </div>
                                    {{-- Featured Image --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="feat_image_path">
                                            Featured Image*
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="featured_image" name="featured_image" type="file" value="{{ old('feat_image_path') }}" accept="image/*" required>
                                        <p class="text-left text-indigo-500"><small>Min width: 1200px, min height:
                                                800px, max size: 2500kb</small></p>
                                    </div>
                                    {{-- Gallery Images --}}
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="bathrooms">
                                            Gallery Images
                                        </label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" type="file" name="file[]" id="file" accept="image/*" multiple>
                                        <p class="text-left text-indigo-500"><small>Max size: 2500kb per image</small>
                                        </p>
                                    </div>
                                    {{-- Submit --}}
                                    <div class=" mb-4 xl:mb-8 mx-auto w-48">
                                        <input class="py-2 bg-green-300 hover:bg-green-200 text-white w-full font-bold rounded shadow" value="Submit Property" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
