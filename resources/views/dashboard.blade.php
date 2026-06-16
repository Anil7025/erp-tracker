<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ __('ERP Tracker Dashboard') }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('You are logged in as') }}
                                <span class="font-semibold">
                                    {{ auth()->user()->getRoleNames()->implode(', ') ?: 'No role assigned' }}
                                </span>
                            </p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            @role('super admin')
                                <a href="{{ route('super-admin.index') }}" class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                                    <div class="font-semibold">Super Admin Panel</div>
                                    <div class="text-sm text-gray-500">Users, roles and permissions control</div>
                                </a>
                            @endrole

                            @can('manage employees')
                                <div class="rounded-lg border border-gray-200 p-4">
                                    <div class="font-semibold">Employees</div>
                                    <div class="text-sm text-gray-500">Employee and HR management</div>
                                </div>
                            @endcan

                            @role('super admin|admin')
                                <a href="{{ route('admin-panel.index') }}" class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                                    <div class="font-semibold">Admin Panel</div>
                                    <div class="text-sm text-gray-500">Create manager, HR, staff and user accounts</div>
                                </a>
                            @endrole

                            @can('manage projects')
                                <div class="rounded-lg border border-gray-200 p-4">
                                    <div class="font-semibold">Projects</div>
                                    <div class="text-sm text-gray-500">Project and team tracking</div>
                                </div>
                            @endcan

                            @can('manage tasks')
                                <div class="rounded-lg border border-gray-200 p-4">
                                    <div class="font-semibold">Tasks</div>
                                    <div class="text-sm text-gray-500">Assigned ERP work tracking</div>
                                </div>
                            @endcan

                            @can('view reports')
                                <div class="rounded-lg border border-gray-200 p-4">
                                    <div class="font-semibold">Reports</div>
                                    <div class="text-sm text-gray-500">ERP reports and insights</div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
