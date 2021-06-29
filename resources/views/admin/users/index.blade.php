<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Users Overview</p>
                </div>
                <div class="py-2 px-4 bg-green-300 hover:bg-green-200 border-b border-gray-200 w-full lg:w-2/12 mt-4">
                    <a href="/admin/users/create">&#43; Create New User</a>
                </div>

                <div class="container my-4 pb-2 overflow-x-auto">

                    <table class="shadow-lg bg-white mx-auto w-full">
                        <tr>
                            <th class="bg-yellow-100 border text-left px-8 py-4">ID</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Name</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Email</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Admin</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Properties</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Show</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Edit</th>
                            <th class="bg-yellow-100 border text-left px-8 py-4">Delete</th>

                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td class="border px-8 py-4">{{ $user->id }}</td>
                            <td class="border px-8 py-4">{{ $user->last_name }}, {{ $user->first_name}}</td>
                            <td class="border px-8 py-4">{{ $user->email }}</td>
                            <td class="border px-8 py-4">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                            <td class="border px-8 py-4">{{ $user->properties->count() }}</td>
                            <td class="border px-8 py-4 text-green-500"><a href="/admin/users/{{ $user->id }}">Show</a></td>
                            <td class="border px-8 py-4 text-blue-500"><a href="/admin/users/{{ $user->id }}/edit">Edit</a></td>
                            <td class="border px-8 py-4 text-red-500">
                                <form action="/admin/users/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="bg-white cursor-pointer px-2 py-1 block" onclick="return confirm('Are you sure you want to delete this user')">
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </table>

                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
