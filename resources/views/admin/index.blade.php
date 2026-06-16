<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Admin Panel') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            <div class="grid gap-6 lg:grid-cols-2">
                <a href="{{ route('admin-panel.users') }}" class="bg-white p-6 shadow-sm sm:rounded-lg hover:bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Create & Manage Users</h3>
                    <p class="mt-2 text-sm text-gray-600">Manager, HR, Staff aur User accounts add karein aur role update karein.</p>
                    <p class="mt-4 text-3xl font-bold text-gray-900">{{ $usersCount }}</p>
                </a>
                <a href="{{ route('admin-panel.roles') }}" class="bg-white p-6 shadow-sm sm:rounded-lg hover:bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Role Permissions</h3>
                    <p class="mt-2 text-sm text-gray-600">Manager, HR, Staff aur User roles ki permissions set karein.</p>
                </a>
            </div>

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900">Managed Roles</h3>
                <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($roles as $role)
                        <div class="rounded border border-gray-200 p-4">
                            <div class="font-semibold text-gray-900">{{ ucfirst($role->name) }}</div>
                            <div class="text-sm text-gray-500">{{ $role->users_count }} users</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>