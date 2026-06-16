<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Roles Permission Control') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('super-admin.permissions.store') }}" class="bg-white p-6 shadow-sm sm:rounded-lg">
                @csrf
                <h3 class="text-lg font-semibold text-gray-900">Create New Permission</h3>
                <p class="mt-1 text-sm text-gray-500">Example: manage invoices, view inventory, approve leave</p>

                <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                    <div class="flex-1">
                        <x-text-input name="name" class="block w-full" :value="old('name')" placeholder="permission name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <x-primary-button>Create Permission</x-primary-button>
                </div>
            </form>

            @foreach ($roles as $role)
                <form method="POST" action="{{ route('super-admin.roles.permissions.update', $role) }}" class="bg-white p-6 shadow-sm sm:rounded-lg">
                    @csrf
                    @method('PUT')
                    @php($isSuperAdminRole = $role->name === 'super admin')

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ ucfirst($role->name) }}</h3>
                            <p class="text-sm text-gray-500">
                                {{ $isSuperAdminRole ? 'Readonly: all current and future permissions allowed automatically' : $role->permissions->count().' permissions assigned' }}
                            </p>
                        </div>
                        @unless ($isSuperAdminRole)
                            <x-primary-button>Save Permissions</x-primary-button>
                        @endunless
                    </div>

                    <div class="mt-6 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($permissions as $permission)
                            <label class="flex items-center gap-2 rounded border border-gray-200 p-2 text-sm">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" @checked($isSuperAdminRole || $role->hasPermissionTo($permission->name)) @disabled($isSuperAdminRole)>
                                <span>{{ ucfirst($permission->name) }}</span>
                            </label>
                        @endforeach
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</x-app-layout>