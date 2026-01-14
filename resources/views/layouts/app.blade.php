<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Dashboard'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Dashboard UI Library CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard-ui/css/dashboard.css') }}">

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar - القائمة الجانبية -->
        <aside class="dashboard-sidebar" id="dashboardSidebar">
            <!-- Sidebar Header -->
            <div class="sidebar-header">
                <a href="{{ url('/') }}" class="sidebar-logo">
                    <span class="sidebar-logo-icon">📊</span>
                    <span class="sidebar-logo-text">Dashboard</span>
                </a>
                <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle Sidebar">
                    <span>☰</span>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="sidebar-nav">
                <!-- Main Navigation Section -->
                <div class="sidebar-section-title">القائمة الرئيسية</div>
                
                <div class="sidebar-nav-item">
                    <a href="{{ url('/') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">🏠</span>
                        <span class="sidebar-nav-text">الرئيسية</span>
                    </a>
                </div>

                <div class="sidebar-nav-item">
                    <a href="{{ url('/dashboard') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">📈</span>
                        <span class="sidebar-nav-text">لوحة التحكم</span>
                    </a>
                </div>

                <div class="sidebar-nav-item">
                    <a href="{{ url('/users') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">👥</span>
                        <span class="sidebar-nav-text">المستخدمون</span>
                    </a>
                </div>

                <div class="sidebar-nav-item">
                    <a href="{{ url('/settings') }}" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">⚙️</span>
                        <span class="sidebar-nav-text">الإعدادات</span>
                    </a>
                </div>

                <!-- Additional Navigation Items -->
                @hasSection('sidebar-nav')
                    @yield('sidebar-nav')
                @endif
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="dashboard-main">
            <!-- Navbar - الشريط العلوي -->
            <header class="dashboard-navbar">
                <div class="navbar-left">
                    <button class="navbar-mobile-toggle" id="mobileToggle" aria-label="Toggle Menu">
                        <span>☰</span>
                    </button>
                    
                    <div class="navbar-search">
                        <span class="navbar-search-icon">🔍</span>
                        <input type="text" class="navbar-search-input" placeholder="بحث...">
                    </div>
                </div>

                <div class="navbar-right">
                    <!-- Notifications -->
                    <div class="navbar-item" data-dropdown>
                        <button class="navbar-icon-btn" data-dropdown-toggle aria-label="Notifications">
                            <span>🔔</span>
                            <span class="navbar-badge">3</span>
                        </button>
                    </div>

                    <!-- Messages -->
                    <div class="navbar-item" data-dropdown>
                        <button class="navbar-icon-btn" data-dropdown-toggle aria-label="Messages">
                            <span>💬</span>
                            <span class="navbar-badge">5</span>
                        </button>
                    </div>

                    <!-- User Menu -->
                    <div class="navbar-user" data-dropdown>
                        <div class="navbar-user-avatar">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <div class="navbar-user-info">
                            <div class="navbar-user-name">{{ auth()->user()->name ?? 'المستخدم' }}</div>
                            <div class="navbar-user-role">{{ auth()->user()->role ?? 'مدير' }}</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="dashboard-content">
                <!-- Content Header -->
                <div class="content-header">
                    <h1 class="content-title">@yield('page-title', 'لوحة التحكم')</h1>
                    <p class="content-subtitle">@yield('page-subtitle', 'مرحباً بك في لوحة التحكم')</p>
                </div>

                <!-- Main Content -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Dashboard UI Library JavaScript -->
    <script src="{{ asset('dashboard-ui/js/dashboard.js') }}"></script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
