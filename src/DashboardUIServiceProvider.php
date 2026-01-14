<?php

namespace Alyasi\DashboardUI;

use Illuminate\Support\ServiceProvider;
use Alyasi\DashboardUI\Commands\InstallCommand;
use Alyasi\DashboardUI\Commands\PublishCommand;

/**
 * Dashboard UI Service Provider
 * مزود خدمة مكتبة واجهات التحكم
 * 
 * يقوم بتسجيل المكتبة تلقائياً في Laravel
 */
class DashboardUIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * تسجيل الخدمات
     */
    public function register()
    {
        // دمج ملفات التكوين
        $this->mergeConfigFrom(
            __DIR__ . '/../config/dashboard-ui.php',
            'dashboard-ui'
        );

        // تحميل ملفات المساعدة
        if (file_exists(__DIR__ . '/helpers.php')) {
            require_once __DIR__ . '/helpers.php';
        }
    }

    /**
     * Bootstrap services.
     * تهيئة الخدمات
     */
    public function boot()
    {
        // نشر ملفات التكوين
        $this->publishes([
            __DIR__ . '/../config/dashboard-ui.php' => config_path('dashboard-ui.php'),
        ], 'dashboard-ui-config');

        // نشر ملفات الأصول (Assets)
        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/dashboard-ui'),
        ], 'dashboard-ui-assets');

        // نشر ملفات Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-ui'),
        ], 'dashboard-ui-views');

        // تحميل Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-ui');

        // تسجيل الأوامر (Commands)
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                PublishCommand::class,
            ]);
        }
    }
}
