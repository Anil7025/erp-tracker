<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold text-slate-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
        $cards = [
            ['title' => 'Super Admin', 'desc' => 'Separate role and permission control pages.', 'route' => 'super-admin.index', 'role' => 'super admin', 'color' => 'from-indigo-500 to-violet-600'],
            ['title' => 'Admin Panel', 'desc' => 'Create users and manage admin-level access.', 'route' => 'admin-panel.index', 'role' => 'super admin|admin', 'color' => 'from-slate-700 to-slate-900'],
            ['title' => 'Employees', 'desc' => 'Employee and HR management module.', 'route' => 'modules.employees', 'can' => 'manage employees', 'color' => 'from-emerald-500 to-teal-600'],
            ['title' => 'Attendance', 'desc' => 'Attendance access based on permission.', 'route' => 'modules.attendance', 'can' => 'manage attendance', 'color' => 'from-cyan-500 to-blue-600'],
            ['title' => 'Payroll', 'desc' => 'Payroll module access for allowed users.', 'route' => 'modules.payroll', 'can' => 'manage payroll', 'color' => 'from-amber-500 to-orange-600'],
            ['title' => 'Projects', 'desc' => 'Project and team tracking module.', 'route' => 'modules.projects', 'can' => 'manage projects', 'color' => 'from-purple-500 to-fuchsia-600'],
            ['title' => 'Tasks', 'desc' => 'Assigned ERP work tracking.', 'route' => 'modules.tasks', 'can' => 'manage tasks', 'color' => 'from-rose-500 to-pink-600'],
            ['title' => 'Reports', 'desc' => 'ERP reports and insights.', 'route' => 'modules.reports', 'can' => 'view reports', 'color' => 'from-blue-500 to-indigo-600'],
        ];
        $allowedCards = collect($cards)->filter(function ($card) {
            $user = auth()->user();
            if (isset($card['role']) && $user->hasAnyRole(explode('|', $card['role']))) return true;
            if (isset($card['can']) && $user->can($card['can'])) return true;
            return false;
        });
    @endphp

    <div class="space-y-6">
        <div class="overflow-hidden rounded-3xl bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900 p-6 text-white shadow-xl sm:p-8">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-wide text-indigo-200">Role based access dashboard</p>
                <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Welcome, {{ auth()->user()->name }}</h1>
                <p class="mt-3 text-slate-300">Aapko sidebar aur dashboard par wahi modules dikh rahe hain jinke liye role ya permission assign hai.</p>
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach (auth()->user()->getRoleNames() as $role)
                        <span class="rounded-full bg-white/10 px-3 py-1 text-sm font-semibold text-white">{{ ucfirst($role) }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Assigned Roles</div>
                <div class="mt-2 text-2xl font-bold text-slate-900">{{ auth()->user()->roles()->count() }}</div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Direct Permissions</div>
                <div class="mt-2 text-2xl font-bold text-slate-900">{{ auth()->user()->permissions()->count() }}</div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Accessible Modules</div>
                <div class="mt-2 text-2xl font-bold text-slate-900">{{ $allowedCards->count() }}</div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <div class="text-sm text-slate-500">Account</div>
                <div class="mt-2 text-2xl font-bold text-emerald-600">Active</div>
            </div>
        </div>

        <div>
            <h3 class="text-lg font-bold text-slate-900">Your Modules</h3>
            <div class="mt-4 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($allowedCards as $card)
                    <a href="{{ route($card['route']) }}" class="group overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="h-2 bg-gradient-to-r {{ $card['color'] }}"></div>
                        <div class="p-6">
                            <h4 class="text-lg font-bold text-slate-900">{{ $card['title'] }}</h4>
                            <p class="mt-2 text-sm text-slate-500">{{ $card['desc'] }}</p>
                            <div class="mt-5 text-sm font-semibold text-indigo-600">Open module →</div>
                        </div>
                    </a>
                @empty
                    <div class="rounded-2xl bg-white p-6 text-slate-600 shadow-sm ring-1 ring-slate-200">No module access assigned. Super Admin se role/permission assign karwayein.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
