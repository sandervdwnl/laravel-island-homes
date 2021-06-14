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
                    This is the Admin - Single Users Overview!
                </div>

                <div class="container my-4 pb-2 pl-8 xl:text-lg">

                    <h2 class="xl:font-xl font-bold mb-4">User information</h2>
                    <hr class="mb-4">

                    @if($user)
                    <h2 class="font-semibold">ID</h2>
                    <p class="mb-4 text-gray-500">{{ $user->id }}</p>
                    <h2 class="font-semibold">First Name</h2>
                    <p class="mb-4 text-gray-500">{{ $user->first_name }}</p>
                    <h2 class="font-semibold">Last Name</h2>
                    <p class="mb-4 text-gray-500">{{ $user->last_name }}</p>
                    <h2 class="font-semibold">Email</h2>
                    <p class="mb-4 text-gray-500">{{ $user->email }}</p>
                    <h2 class="font-semibold">Admin</h2>
                    <p class="mb-4 text-gray-500">{{ $user->is_admin ? 'Yes' : 'No' }}</p>
                    <div class="py-4 ">
                        <a class="bg-blue-300 hover:bg-blue-200 text-white w-20 rounded py-2 px-8 mr-2 shadow" href="/admin/users/{{ $user->id }}/edit">Edit</a>
                        <a class="bg-red-300 hover:bg-red-200 text-white w-20 rounded py-2 px-8 shadow">Delete</a>
                    </div>
                    @else
                    <p>User not found</p>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
