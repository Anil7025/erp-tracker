<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create & Manage Users') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('admin-panel.users.store') }}" class="bg-white p-6 shadow-sm sm:rounded-lg">
                @csrf
                <h3 class="text-lg font-semibold text-gray-900">Add New Manager / HR / Staff / User</h3>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" class="mt-1 block w-full" :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="role" value="Role" />
                        <select id="role" name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            @foreach ($managedRoles as $role)
                                <option value="{{ $role }}" @selected(old('role') === $role)>{{ ucfirst($role) }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-6">
                    <x-primary-button>Create User</x-primary-button>
                </div>
            </form>

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900">Managed Users</h3>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-500">Name</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-500">Email</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-500">Role</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-500">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">{{ $user->getRoleNames()->implode(', ') }}</td>
                                    <td class="px-4 py-3">
                                        <form method="POST" action="{{ route('admin-panel.users.role.update', $user) }}" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="role" class="rounded-md border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                @foreach ($managedRoles as $role)
                                                    <option value="{{ $role }}" @selected($user->hasRole($role))>{{ ucfirst($role) }}</option>
                                                @endforeach
                                            </select>
                                            <x-primary-button>Save</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>