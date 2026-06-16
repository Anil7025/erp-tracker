<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Users Role & Permission Control') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-md bg-green-50 p-4 text-sm text-green-700">{{ session('status') }}</div>
            @endif

            @foreach ($users as $user)
                <form method="POST" action="{{ route('super-admin.users.access.update', $user) }}" class="bg-white p-6 shadow-sm sm:rounded-lg">
                    @csrf
                    @method('PUT')
                    @php($isSuperAdminUser = $user->hasRole('super admin'))

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                            @if ($isSuperAdminUser)
                                <p class="mt-1 text-xs font-semibold text-amber-600">Readonly: Super Admin ko automatically sabhi permissions ka access hai.</p>
                            @endif
                        </div>
                        @unless ($isSuperAdminUser)
                            <x-primary-button>Save Access</x-primary-button>
                        @endunless
                    </div>

                    <div class="mt-6 grid gap-6 lg:grid-cols-2">
                        <div>
                            <h4 class="font-semibold text-gray-900">Roles</h4>
                            <div class="mt-3 grid gap-2 sm:grid-cols-2">
                                @foreach ($roles as $role)
                                    <label class="flex items-center gap-2 rounded border border-gray-200 p-2 text-sm">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" @checked($user->hasRole($role->name)) @disabled($isSuperAdminUser || $role->name === 'super admin')>
                                        <span>{{ ucfirst($role->name) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-900">Direct Permissions</h4>
                            <div class="mt-3 grid gap-2 sm:grid-cols-2">
                                @foreach ($permissions as $permission)
                                    <label class="flex items-center gap-2 rounded border border-gray-200 p-2 text-sm">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" @checked($isSuperAdminUser || $user->hasDirectPermission($permission->name)) @disabled($isSuperAdminUser)>
                                        <span>{{ ucfirst($permission->name) }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Note: Direct permissions user-specific hoti hain; role permissions alag se inherited rahengi.</p>
                        </div>
                    </div>
                </form>
            @endforeach

            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>