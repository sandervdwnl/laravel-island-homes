<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div>
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


            </div>
        </div>

        <div class="main">
            <h3 class="text-center font-bold text-xl xl:text-3xl py-4">Contact Us</h3>
            <div class="p-4 max-w-7xl text-center mx-auto">

                @if(isset($success))
                <div class="message bg-green-300 text-gray-700 py-2 font-bold mb-8">{{ $success }}</div>
                @endif

                @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('validateContact') }}" id="contact-form" method="POST" class="w-full">
                    @csrf
                    <div class="mb-6 font-bold w-full"><label for="Email">Email Adress</label><br>
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="example@mail.com" minlength="6" required class="w-full lg:w-1/2 rounded">
                    </div>
                    <div class="mb-6 font-bold w-full"><label for="Name">Name</label><br>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Jane Doe" minlength="2" required class="w-full lg:w-1/2 rounded">
                    </div>
                    <div class="font-bold mb-6 w-full"><label for="Message">Message</label><br>
                        <textarea name="msg" cols="30" rows="10" placeholder="Type here.." class="w-full lg:w-1/2 rounded">{{ old('msg') }}</textarea><br>
                        <input type="submit" class="btn px-4 py-2 bg-blue-100 mt-4 rounded shadow" value="Send Message &#x1F81E;">
                    </div>
                </form>

            </div>

        </div>
</x-guest-layout>
