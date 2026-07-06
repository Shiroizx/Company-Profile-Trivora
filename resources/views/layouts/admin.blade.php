<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-silver-100">
    <div class="flex min-h-screen relative">
        <!-- Mobile Sidebar Overlay -->
        <div id="sidebarOverlay" class="admin-sidebar-overlay"></div>

        <aside id="adminSidebar" class="admin-sidebar-mobile lg:relative lg:translate-x-0 lg:flex lg:w-64 shrink-0 flex-col border-r border-silver-300 bg-navy-900">
            <div class="border-b border-navy-700 px-5 py-6">
                <p class="font-display text-lg font-bold text-white">Trivora Admin</p>
                <p class="mt-1 text-xs text-silver-400">Kelola Landing Page</p>
            </div>
            <nav class="flex-1 space-y-1 p-4">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan Situs
                </a>
                <a href="{{ route('admin.sections.index') }}" class="admin-nav-link {{ request()->routeIs('admin.sections.*') ? 'is-active' : '' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    Section Landing
                </a>
                <a href="{{ route('admin.messages.index') }}" class="admin-nav-link {{ request()->routeIs('admin.messages.*') ? 'is-active' : '' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span class="flex-1">Pesan Masuk</span>
                    @php $unreadCount = \App\Models\Message::where('is_read', false)->count(); @endphp
                    @if ($unreadCount > 0)
                        <span class="rounded-full bg-gold-500 px-2 py-0.5 text-xs font-bold text-navy-950">{{ $unreadCount }}</span>
                    @endif
                </a>
                <a href="{{ url('/') }}" target="_blank" rel="noopener" class="admin-nav-link">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Situs
                </a>
            </nav>
            <div class="border-t border-navy-700 p-4">
                <p class="truncate text-xs text-silver-400">{{ auth()->user()->email }}</p>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="admin-nav-link w-full text-left text-red-300 hover:bg-red-500/10 hover:text-red-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="flex items-center justify-between border-b border-silver-300 bg-white px-4 py-4 lg:px-8 relative z-20">
                <div>
                    <h1 class="font-display text-xl font-bold text-navy-900">@yield('heading', 'Dashboard')</h1>
                    @hasSection('subheading')
                        <p class="mt-0.5 text-sm text-navy-600">@yield('subheading')</p>
                    @endif
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" id="mobileMenuBtn" onclick="toggleAdminMenu()" class="admin-btn-secondary text-xs lg:hidden">Menu</button>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="admin-btn-secondary text-xs">Logout</button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-8">
                @if (session('success'))
                    <div class="admin-alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="admin-alert-error">{{ session('error') }}</div>
                @endif

                @if ($errors->any())
                    <div class="admin-alert-error">
                        <ul class="list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <style>
        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 0.5rem;
            padding: 0.625rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: rgb(192 192 192);
            transition: all 0.15s;
        }
        .admin-nav-link:hover {
            background: rgb(13 33 55);
            color: rgb(232 197 71);
        }
        .admin-nav-link.is-active {
            background: rgb(212 175 55 / 0.15);
            color: rgb(232 197 71);
            font-weight: 600;
        }
    </style>

    <script>
        function toggleAdminMenu() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            if (sidebar) sidebar.classList.toggle('is-open');
            if (overlay) overlay.classList.toggle('is-open');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('sidebarOverlay');
            if (overlay) overlay.addEventListener('click', toggleAdminMenu);
        });
    </script>
</body>
</html>
