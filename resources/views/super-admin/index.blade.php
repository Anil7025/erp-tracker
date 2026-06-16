<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Super Admin Panel') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            <div class="grid gap-6 sm:grid-cols-3">
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="text-sm text-gray-500">Users</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900">{{ $usersCount }}</div>
                </div>
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="text-sm text-gray-500">Roles</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900">{{ $rolesCount }}</div>
                </div>
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="text-sm text-gray-500">Permissions</div>
                    <div class="mt-2 text-3xl font-bold text-gray-900">{{ $permissionsCount }}</div>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <a href="{{ route('super-admin.users') }}" class="bg-white p-6 shadow-sm sm:rounded-lg hover:bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Users Role & Permission Control</h3>
                    <p class="mt-2 text-sm text-gray-600">Har user ko role assign karein aur direct permissions control karein.</p>
                </a>
                <a href="{{ route('super-admin.roles') }}" class="bg-white p-6 shadow-sm sm:rounded-lg hover:bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900">Roles Permission Control</h3>
                    <p class="mt-2 text-sm text-gray-600">Admin, HR, Manager, Staff aur User roles ki permissions manage karein.</p>
                </a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Users</h3>
                    <div class="mt-4 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500">Name</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500">Email</th>
                                    <th class="px-4 py-3 text-left font-medium text-gray-500">Roles</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($recentUsers as $user)
                                    <tr>
                                        <td class="px-4 py-3">{{ $user->name }}</td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>
                                        <td class="px-4 py-3">{{ $user->getRoleNames()->implode(', ') ?: 'No role' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>