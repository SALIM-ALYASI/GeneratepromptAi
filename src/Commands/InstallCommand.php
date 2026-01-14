<?php

namespace Alyasi\DashboardUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Install Command
 * أمر التثبيت
 * 
 * يقوم بنسخ جميع ملفات المكتبة إلى المشروع تلقائياً
 */
class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard-ui:install 
                            {--force : Force overwrite existing files}
                            {--assets-only : Install assets only}
                            {--views-only : Install views only}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'تثبيت مكتبة Dashboard UI - Install Dashboard UI Library';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🚀 بدء تثبيت مكتبة Dashboard UI...');
        $this->newLine();

        $force = $this->option('force');
        $assetsOnly = $this->option('assets-only');
        $viewsOnly = $this->option('views-only');

        // تثبيت Assets
        if (!$viewsOnly) {
            $this->installAssets($force);
        }

        // تثبيت Views
        if (!$assetsOnly) {
            $this->installViews($force);
        }

        // تثبيت ملف التكوين
        if (!$assetsOnly && !$viewsOnly) {
            $this->installConfig($force);
        }

        $this->newLine();
        $this->info('✅ تم التثبيت بنجاح!');
        $this->info('📖 راجع ملف DASHBOARD_UI_README.md للبدء');
        $this->newLine();

        return Command::SUCCESS;
    }

    /**
     * Install Assets
     * تثبيت ملفات الأصول
     */
    protected function installAssets($force = false)
    {
        $this->info('📦 تثبيت ملفات CSS و JavaScript...');

        $sourcePath = __DIR__ . '/../../public/dashboard-ui';
        $targetPath = public_path('dashboard-ui');

        if (File::exists($targetPath) && !$force) {
            if (!$this->confirm('المجلد dashboard-ui موجود بالفعل. هل تريد استبداله؟', false)) {
                $this->warn('تم تخطي تثبيت Assets');
                return;
            }
        }

        if (File::exists($targetPath)) {
            File::deleteDirectory($targetPath);
        }

        File::copyDirectory($sourcePath, $targetPath);

        $this->info('✅ تم تثبيت Assets بنجاح');
    }

    /**
     * Install Views
     * تثبيت ملفات Views
     */
    protected function installViews($force = false)
    {
        $this->info('📄 تثبيت ملفات Views...');

        $sourcePath = __DIR__ . '/../../resources/views';
        $targetPath = resource_path('views/vendor/dashboard-ui');

        // إنشاء المجلد إذا لم يكن موجوداً
        if (!File::exists($targetPath)) {
            File::makeDirectory($targetPath, 0755, true);
        }

        // نسخ layouts
        $layoutsSource = $sourcePath . '/layouts';
        $layoutsTarget = $targetPath . '/layouts';

        if (File::exists($layoutsTarget) && !$force) {
            if (!$this->confirm('ملفات layouts موجودة بالفعل. هل تريد استبدالها؟', false)) {
                $this->warn('تم تخطي تثبيت layouts');
            } else {
                File::deleteDirectory($layoutsTarget);
                File::copyDirectory($layoutsSource, $layoutsTarget);
                $this->info('✅ تم تثبيت layouts');
            }
        } else {
            if (File::exists($layoutsTarget)) {
                File::deleteDirectory($layoutsTarget);
            }
            File::copyDirectory($layoutsSource, $layoutsTarget);
            $this->info('✅ تم تثبيت layouts');
        }

        // نسخ dashboard
        $dashboardSource = $sourcePath . '/dashboard';
        $dashboardTarget = $targetPath . '/dashboard';

        if (File::exists($dashboardTarget) && !$force) {
            if (!$this->confirm('ملفات dashboard موجودة بالفعل. هل تريد استبدالها؟', false)) {
                $this->warn('تم تخطي تثبيت dashboard');
            } else {
                File::deleteDirectory($dashboardTarget);
                File::copyDirectory($dashboardSource, $dashboardTarget);
                $this->info('✅ تم تثبيت dashboard');
            }
        } else {
            if (File::exists($dashboardTarget)) {
                File::deleteDirectory($dashboardTarget);
            }
            File::copyDirectory($dashboardSource, $dashboardTarget);
            $this->info('✅ تم تثبيت dashboard');
        }
    }

    /**
     * Install Config
     * تثبيت ملف التكوين
     */
    protected function installConfig($force = false)
    {
        $this->info('⚙️  تثبيت ملف التكوين...');

        $sourcePath = __DIR__ . '/../../config/dashboard-ui.php';
        $targetPath = config_path('dashboard-ui.php');

        if (File::exists($targetPath) && !$force) {
            if (!$this->confirm('ملف التكوين موجود بالفعل. هل تريد استبداله؟', false)) {
                $this->warn('تم تخطي تثبيت ملف التكوين');
                return;
            }
        }

        File::copy($sourcePath, $targetPath);
        $this->info('✅ تم تثبيت ملف التكوين');
    }
}
