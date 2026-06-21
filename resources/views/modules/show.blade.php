<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold text-slate-900 leading-tight">{{ $title }}</h2>
    </x-slot>

    <div class="space-y-6">
        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-indigo-600">Permission protected module</p>
                    <h1 class="mt-2 text-3xl font-bold text-slate-900">{{ $title }}</h1>
                    <p class="mt-2 max-w-2xl text-slate-600">{{ $description }}</p>
                </div>
                <a href="{{ route('dashboard') }}" class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">Back to Dashboard</a>
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-3">
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Access Status</div>
                <div class="mt-2 text-2xl font-bold text-emerald-600">Allowed</div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Your Roles</div>
                <div class="mt-2 text-lg font-bold text-slate-900">{{ auth()->user()->getRoleNames()->implode(', ') ?: 'No role' }}</div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Managed By</div>
                <div class="mt-2 text-lg font-bold text-slate-900">Super Admin Permissions</div>
            </div>
        </div>
    </div>
</x-app-layout>