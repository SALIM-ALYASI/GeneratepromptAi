<?php

namespace Alyasi\DashboardUI\Commands;

use Illuminate\Console\Command;

/**
 * Publish Command
 * أمر النشر
 * 
 * يقوم بنشر ملفات المكتبة باستخدام نظام Laravel للنشر
 */
class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard-ui:publish 
                            {--tag= : Publish specific tag (assets, views, config)}
                            {--force : Force overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'نشر ملفات مكتبة Dashboard UI - Publish Dashboard UI Library files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tag = $this->option('tag');
        $force = $this->option('force');

        $this->info('📦 نشر ملفات مكتبة Dashboard UI...');
        $this->newLine();

        if ($tag) {
            $this->call('vendor:publish', [
                '--provider' => 'Alyasi\DashboardUI\DashboardUIServiceProvider',
                '--tag' => 'dashboard-ui-' . $tag,
                '--force' => $force,
            ]);
        } else {
            $this->call('vendor:publish', [
                '--provider' => 'Alyasi\DashboardUI\DashboardUIServiceProvider',
                '--force' => $force,
            ]);
        }

        $this->newLine();
        $this->info('✅ تم النشر بنجاح!');

        return Command::SUCCESS;
    }
}
