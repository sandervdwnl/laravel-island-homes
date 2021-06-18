<x-guest-layout>
    @section('tinymce')
    <script src="https://cdn.tiny.cloud/1/izqu9favecmjvbbfp1dhe96fphutb1stn4aqs7363k6j8trm/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
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
                    <h1 class="text-2xl px-12 font-bold w-full my-4">Add Property<span
                            class="text-sm ml-2 text-gray-500 italic">All fields are required</span></h1>


                    <div class="container my-4 xl:text-lg text-center">

                        <div class="w-full mx-auto">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="../properties" method="post" enctype="multipart/form-data"
                                class="bg-white shadow-md rounded mb-4 xl:mb-8 w-full">
                                @csrf
                                <div class="form-wrapper w-full flex flex-wrap px-8">
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="title">
                                            Property Title
                                        </label>
                                        <input
                                            class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="title" type="text" placeholder="Title of the property" name="title"
                                            value="{{ old('title') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="asking_price">
                                            Asking Price
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="asking_price" name="asking_price" type="number"
                                            placeholder="Price in $ USD" value="{{ old('asking_price') }}" required>
                                    </div>
                                    <h2 class="text-center text-xl font-bold w-full my-4">Adress</h2>

                                    <div class="mb-4 xl:mb-8 w-full xl:w-2/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="street">
                                            Street
                                        </label>
                                        <input
                                            class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="street" name="street" type="text" placeholder="Name of the street"
                                            value="{{ old('street') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="number">
                                            Number
                                        </label>
                                        <input
                                            class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="number" name="number" type="text" placeholder="Appt/house number"
                                            value="{{ old('number') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8  w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="zip_code">
                                            Zip Code
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="zip_code" name="zip_code" type="text" placeholder="12345"
                                            value="{{ old('zip_code') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="city">
                                            City
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="city" name="city" type="text" placeholder="New Tork"
                                            value="{{ old('city') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/3 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="location">
                                            Location
                                        </label>
                                        <select name="location_id" id="location_id" class="w-full">
                                            @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <h2 class="text-center text-xl font-bold w-full my-4">Position<span
                                            class="text-sm ml-2 text-gray-500">Get with <a
                                                href="https://www.google.com/maps" target="_blank"
                                                class="text-blue-500">Google Maps</a> or <a
                                                href="https://www.latlong.net/" target="_blank"
                                                class="text-blue-500">Latlong</a> </span></h2>

                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="latitude">
                                            Latitude
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="latitude" name="latitude" min="11.979144" max="18.145982"
                                            step="0.000001" type="number" placeholder="12.345678"
                                            value="{{ old('latitude') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="longitude">
                                            Longitude
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="longitude" name="longitude" min="-68.440281" max="-62.966999"
                                            step="0.000001" type="number" placeholder="-12.345678"
                                            value="{{ old('longitude') }}" required>
                                    </div>

                                    <h2 class="text-center text-xl font-bold w-full my-4">Property Details</h2>

                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="built_in">
                                            Built in Year
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="built_in" name="built_in" min="1900" step="1" type="number"
                                            placeholder="2010" value="{{ old('built_in') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2"
                                            for="area_size_indoor">
                                            Indoor Area Size
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="area_size_indoor" name="area_size_indoor" type="number"
                                            placeholder="Size in sqm (m2)" step="1"
                                            value="{{ old('area_size_indoor') }}" required>
                                        <small>1 sqft = 0.09290304 sqm</small>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2"
                                            for="area_size_outdoor">
                                            Outdoor Area Size
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="area_size_outdoor" name="area_size_outdoor" type="number"
                                            placeholder="Size in sqm (m2)" step="1"
                                            value="{{ old('area_size_outdoor') }}" required>
                                        <small>1 sqft = 0.09290304 sqm</small>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="bedrooms">
                                            Bedrooms
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="bedrooms" name="bedrooms" type="number" step="1"
                                            value="{{ old('bedrooms') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="bathrooms">
                                            Bathrooms
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="bathrooms" name="bathrooms" type="number" step="1"
                                            value="{{ old('bathrooms') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-4/12 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="property_type">
                                            Property Type
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
                                    <div class="mb-4 xl:mb-8 w-full">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="description">
                                            Description
                                        </label>
                                        <textarea
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="description" name="description">
                                        {{ old('description') }}
                                        </textarea>
                                    </div>

                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2"
                                            for="feat_image_path">
                                            Featured Image
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            id="feat_image_path" name="feat_image_path" type="file"
                                            value="{{ old('feat_image_path') }}" required>
                                    </div>
                                    <div class="mb-4 xl:mb-8 w-full xl:w-1/2 px-4">
                                        <label class="block text-gray-500 text-base font-bold mb-2" for="bathrooms">
                                            Gallery Images
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
                                            type="file" name="file[]" id="file" required="" multiple>
                                    </div>

                                    <div class=" mb-4 xl:mb-8 mx-auto w-48">
                                        <input
                                            class="py-2 bg-green-300 hover:bg-green-200 text-white w-full font-bold rounded shadow"
                                            id="email" value="Submit Property" type="submit">
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