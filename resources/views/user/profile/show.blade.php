<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    This is the User Profile!
                </div>

                @if (session('success'))
                <div class="py-4 bg-green-200 text-bold font-lg text-center">
                    {{ session('success') }}
                </div>
                @endif

                <div class="container my-4 pb-2 pl-8 xl:text-lg">

                    <h2 class="xl:font-xl font-bold mb-4">User Profile</h2>
                    <hr class="mb-4">

                    @if($user)
                    <h2 class="font-semibold">First Name</h2>
                    <p class="mb-4 text-gray-500">{{ $user->first_name }}</p>
                    <h2 class="font-semibold">Last Name</h2>
                    <p class="mb-4 text-gray-500">{{ $user->last_name }}</p>
                    <h2 class="font-semibold">Email</h2>
                    <p class="mb-4 text-gray-500">{{ $user->email }}</p>
                    <div class="py-4 ">
                        <a class="bg-blue-300 hover:bg-blue-200 text-white w-20 rounded py-2 px-8 mr-2 shadow" href="/user/{{ $user->id }}/edit">Edit Details</a>
                        <form action="{{ $user->id }}/delete" method="post" class="mt-4 sm:mt-0 sm:inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="bg-red-300 inline hover:bg-red-200 text-white rounded py-2 px-8 mr-2 block shadow cursor-pointer" onclick="return confirm('Are you sure you want to delete your account')">
                        </form>
                    </div>
                    @else
                    <p>Profile not found</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
