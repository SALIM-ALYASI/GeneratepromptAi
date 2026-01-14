<?php

/**
 * Dashboard UI Helper Functions
 * وظائف مساعدة لمكتبة واجهات التحكم
 */

if (!function_exists('dashboard_ui_asset')) {
    /**
     * Get the path to a Dashboard UI asset.
     * الحصول على مسار ملف أصل من مكتبة Dashboard UI
     *
     * @param  string  $path
     * @return string
     */
    function dashboard_ui_asset($path)
    {
        $assetsPath = config('dashboard-ui.assets_path', 'dashboard-ui');
        return asset($assetsPath . '/' . ltrim($path, '/'));
    }
}

if (!function_exists('dashboard_ui_css')) {
    /**
     * Get the path to a Dashboard UI CSS file.
     * الحصول على مسار ملف CSS من مكتبة Dashboard UI
     *
     * @param  string  $file
     * @return string
     */
    function dashboard_ui_css($file = 'dashboard.css')
    {
        return dashboard_ui_asset('css/' . $file);
    }
}

if (!function_exists('dashboard_ui_js')) {
    /**
     * Get the path to a Dashboard UI JavaScript file.
     * الحصول على مسار ملف JavaScript من مكتبة Dashboard UI
     *
     * @param  string  $file
     * @return string
     */
    function dashboard_ui_js($file = 'dashboard.js')
    {
        return dashboard_ui_asset('js/' . $file);
    }
}

if (!function_exists('dashboard_ui_view')) {
    /**
     * Get the path to a Dashboard UI view.
     * الحصول على مسار ملف View من مكتبة Dashboard UI
     *
     * @param  string  $view
     * @return string
     */
    function dashboard_ui_view($view)
    {
        $viewsPath = config('dashboard-ui.views_path', 'vendor.dashboard-ui');
        return $viewsPath . '.' . $view;
    }
}
