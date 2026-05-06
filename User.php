<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bonoan Dental — Receptionist Portal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#6366f1', foreground: '#ffffff', glow: '#818cf8' },
                        success: { DEFAULT: '#10b981', foreground: '#ffffff' },
                        warning: { DEFAULT: '#f59e0b', foreground: '#ffffff' },
                    },
                }
            }
        }
    </script>
    <style>
        .gradient-primary { background: linear-gradient(135deg, #6366f1, #818cf8); }
        .gradient-soft    { background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); }
        .shadow-card      { box-shadow: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.04); }
        .shadow-soft      { box-shadow: 0 4px 14px rgba(99,102,241,.25); }
        .sidebar-link     { display:flex; align-items:center; gap:.5rem; padding:.45rem .75rem; border-radius:.5rem; font-size:.875rem; color:#64748b; transition:.15s; }
        .sidebar-link:hover { background:#f1f5f9; color:#1e293b; }
        .sidebar-link.active { background:#eef2ff; color:#6366f1; font-weight:600; }
        .badge { display:inline-flex; align-items:center; padding:.15rem .6rem; border-radius:9999px; font-size:.7rem; font-weight:500; }
        .badge-success   { background:#d1fae5; color:#065f46; }
        .badge-warning   { background:#fef3c7; color:#92400e; }
        .badge-danger    { background:#fee2e2; color:#991b1b; }
        .badge-secondary { background:#f1f5f9; color:#475569; }
        .btn { display:inline-flex; align-items:center; gap:.35rem; padding:.45rem 1rem; border-radius:.5rem; font-size:.875rem; font-weight:500; cursor:pointer; transition:.15s; border:none; }
        .btn-primary { background:linear-gradient(135deg,#6366f1,#818cf8); color:#fff; }
        .btn-primary:hover { opacity:.9; }
        .btn-outline { background:#fff; border:1px solid #e2e8f0; color:#475569; }
        .btn-outline:hover { background:#f8fafc; }
        .btn-ghost   { background:transparent; color:#6366f1; }
        .btn-ghost:hover { background:#eef2ff; }
        .btn-sm { padding:.3rem .65rem; font-size:.8rem; }
        .card { background:#fff; border:1px solid #e2e8f0; border-radius:.75rem; }
        .input { width:100%; border:1px solid #e2e8f0; border-radius:.5rem; padding:.45rem .75rem; font-size:.875rem; outline:none; transition:.15s; }
        .input:focus { border-color:#6366f1; box-shadow:0 0 0 3px rgba(99,102,241,.12); }
        .label { display:block; font-size:.8rem; font-weight:500; color:#374151; margin-bottom:.35rem; }
        .alert { padding:.75rem 1rem; border-radius:.5rem; font-size:.875rem; margin-bottom:1rem; }
        .alert-success { background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; }
        .alert-error   { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; }
    </style>
</head>
<body class="gradient-soft min-h-screen font-sans text-slate-800">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside id="sidebar" class="w-60 shrink-0 bg-white border-r border-slate-200 flex flex-col shadow-sm">
        {{-- Logo --}}
        <div class="flex items-center gap-2.5 px-4 py-4 border-b border-slate-200">
            <div class="gradient-primary flex h-9 w-9 items-center justify-center rounded-xl shadow-soft">
                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div class="leading-tight">
                <div class="text-sm font-semibold">Bonoan Dental</div>
                <div class="text-[11px] text-slate-400">Receptionist Portal</div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
            <p class="px-3 py-1 text-[10px] font-semibold uppercase tracking-widest text-slate-400">Workspace</p>
            <a href="{{ route('dashboard') }}"    class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            <a href="{{ route('appointments.index') }}" class="sidebar-link {{ request()->routeIs('appointments.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Appointments
            </a>
            <a href="{{ route('schedule.index') }}" class="sidebar-link {{ request()->routeIs('schedule.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Schedule View
            </a>
            <a href="{{ route('checkin.index') }}" class="sidebar-link {{ request()->routeIs('checkin.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Walk-in Check-in
            </a>

            <p class="px-3 pt-4 pb-1 text-[10px] font-semibold uppercase tracking-widest text-slate-400">Records &amp; Billing</p>
            <a href="{{ route('patients.index') }}" class="sidebar-link {{ request()->routeIs('patients.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Patient Records
            </a>
            <a href="{{ route('reminders.index') }}" class="sidebar-link {{ request()->routeIs('reminders.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                Reminders
            </a>
            <a href="{{ route('payments.index') }}" class="sidebar-link {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                Payments
            </a>
            <a href="{{ route('referrals.index') }}" class="sidebar-link {{ request()->routeIs('referrals.*') ? 'active' : '' }}">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                Referral Rewards
            </a>
        </nav>
    </aside>

    {{-- Main --}}
    <div class="flex flex-1 flex-col min-w-0">
        {{-- Top bar --}}
        <header class="sticky top-0 z-30 flex h-14 items-center gap-3 border-b border-slate-200 bg-white/80 px-6 backdrop-blur">
            <div class="hidden sm:flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-sm text-slate-400 w-72">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Search patient, appointment…
            </div>
            <div class="ml-auto flex items-center gap-3">
                <button class="relative rounded-full p-2 hover:bg-slate-100">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-red-500"></span>
                </button>
                <div class="flex items-center gap-2">
                    <div class="gradient-primary flex h-8 w-8 items-center justify-center rounded-full text-xs font-semibold text-white">RC</div>
                    <div class="hidden text-xs leading-tight sm:block">
                        <div class="font-medium">Rina Cruz</div>
                        <div class="text-slate-400">Receptionist</div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Page content --}}
        <main class="flex-1 p-6 lg:p-8">
            @if (session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error mb-4">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>