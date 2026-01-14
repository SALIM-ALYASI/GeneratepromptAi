<?php

/**
 * Dashboard UI Configuration
 * إعدادات مكتبة واجهات التحكم
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | مسار ملفات الأصول (CSS و JavaScript)
    | Path to assets files (CSS and JavaScript)
    |
    */
    'assets_path' => env('DASHBOARD_UI_ASSETS_PATH', 'dashboard-ui'),

    /*
    |--------------------------------------------------------------------------
    | Views Path
    |--------------------------------------------------------------------------
    |
    | مسار ملفات Views
    | Path to views files
    |
    */
    'views_path' => env('DASHBOARD_UI_VIEWS_PATH', 'vendor.dashboard-ui'),

    /*
    |--------------------------------------------------------------------------
    | Layout Name
    |--------------------------------------------------------------------------
    |
    | اسم ملف التخطيط الأساسي
    | Main layout file name
    |
    */
    'layout' => env('DASHBOARD_UI_LAYOUT', 'layouts.app'),

    /*
    |--------------------------------------------------------------------------
    | Sidebar Configuration
    |--------------------------------------------------------------------------
    |
    | إعدادات القائمة الجانبية
    | Sidebar configuration
    |
    */
    'sidebar' => [
        'width' => env('DASHBOARD_UI_SIDEBAR_WIDTH', 260),
        'collapsed_width' => env('DASHBOARD_UI_SIDEBAR_COLLAPSED_WIDTH', 70),
        'remember_state' => env('DASHBOARD_UI_SIDEBAR_REMEMBER_STATE', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Navbar Configuration
    |--------------------------------------------------------------------------
    |
    | إعدادات الشريط العلوي
    | Navbar configuration
    |
    */
    'navbar' => [
        'height' => env('DASHBOARD_UI_NAVBAR_HEIGHT', 64),
        'show_search' => env('DASHBOARD_UI_NAVBAR_SHOW_SEARCH', true),
        'show_notifications' => env('DASHBOARD_UI_NAVBAR_SHOW_NOTIFICATIONS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | إعدادات المظهر
    | Theme configuration
    |
    */
    'theme' => [
        'primary_color' => env('DASHBOARD_UI_PRIMARY_COLOR', '#6366f1'),
        'primary_dark' => env('DASHBOARD_UI_PRIMARY_DARK', '#4f46e5'),
        'primary_light' => env('DASHBOARD_UI_PRIMARY_LIGHT', '#818cf8'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Auto Load Assets
    |--------------------------------------------------------------------------
    |
    | تحميل ملفات الأصول تلقائياً في جميع الصفحات
    | Automatically load assets in all pages
    |
    */
    'auto_load_assets' => env('DASHBOARD_UI_AUTO_LOAD_ASSETS', true),
];
