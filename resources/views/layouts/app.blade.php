<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @php
            $user = auth()->user();
            $menuItems = [
                ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'can' => 'view dashboard'],
                ['label' => 'Super Admin', 'route' => 'super-admin.index', 'pattern' => 'super-admin.*', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'role' => 'super admin'],
                ['label' => 'Admin Panel', 'route' => 'admin-panel.index', 'pattern' => 'admin-panel.*', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'role' => 'super admin|admin'],
                ['label' => 'Employees', 'route' => 'modules.employees', 'pattern' => 'modules.employees', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'can' => 'manage employees'],
                ['label' => 'Attendance', 'route' => 'modules.attendance', 'pattern' => 'modules.attendance', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'can' => 'manage attendance'],
                ['label' => 'Payroll', 'route' => 'modules.payroll', 'pattern' => 'modules.payroll', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z', 'can' => 'manage payroll'],
                ['label' => 'Projects', 'route' => 'modules.projects', 'pattern' => 'modules.projects', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'can' => 'manage projects'],
                ['label' => 'Tasks', 'route' => 'modules.tasks', 'pattern' => 'modules.tasks', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'can' => 'manage tasks'],
                ['label' => 'Reports', 'route' => 'modules.reports', 'pattern' => 'modules.reports', 'icon' => 'M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z', 'can' => 'view reports'],
            ];

            $canSee = function (array $item) use ($user): bool {
                if (! $user) return false;
                if (isset($item['role']) && $user->hasAnyRole(explode('|', $item['role']))) return true;
                if (isset($item['can']) && $user->can($item['can'])) return true;
                return false;
            };
        @endphp

        <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-slate-100">
            <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden" @click="sidebarOpen = false"></div>

            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-40 w-72 transform bg-slate-950 text-white shadow-2xl transition-transform duration-200 lg:translate-x-0">
                <div class="flex h-16 items-center justify-between border-b border-white/10 px-6">
                    <a href="{{ route('dashboard') }}" class="text-lg font-bold tracking-tight">ERP Tracker</a>
                    <button class="rounded-lg p-2 text-slate-300 hover:bg-white/10 lg:hidden" @click="sidebarOpen = false">✕</button>
                </div>

                <div class="px-4 py-5">
                    <div class="rounded-2xl bg-white/10 p-4">
                        <div class="text-sm font-semibold">{{ $user?->name }}</div>
                        <div class="mt-1 truncate text-xs text-slate-300">{{ $user?->email }}</div>
                        <div class="mt-3 flex flex-wrap gap-1">
                            @foreach ($user?->getRoleNames() ?? [] as $roleName)
                                <span class="rounded-full bg-indigo-500/20 px-2 py-1 text-[11px] font-semibold text-indigo-100">{{ ucfirst($roleName) }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <nav class="space-y-1 px-4">
                    @foreach ($menuItems as $item)
                        @if ($canSee($item))
                            @php($active = request()->routeIs($item['pattern'] ?? $item['route']))
                            <a href="{{ route($item['route']) }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition {{ $active ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-950/30' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" /></svg>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endif
                    @endforeach
                </nav>
            </aside>

            <div class="lg:pl-72">
                <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/90 backdrop-blur">
                    <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center gap-3">
                            <button class="rounded-xl border border-slate-200 p-2 text-slate-600 lg:hidden" @click="sidebarOpen = true">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                            </button>
                            <div>
                                @isset($header)
                                    {{ $header }}
                                @else
                                    <h1 class="text-lg font-bold text-slate-900">Dashboard</h1>
                                @endisset
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('profile.edit') }}" class="hidden rounded-xl border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 sm:inline-flex">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="rounded-xl bg-slate-900 px-3 py-2 text-sm font-semibold text-white hover:bg-slate-700">Logout</button>
                            </form>
                        </div>
                    </div>
                </header>

                <main class="p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
