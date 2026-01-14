# دليل التثبيت - Installation Guide

## التثبيت كـ Composer Package (الطريقة الموصى بها)

### 1. التثبيت عبر Composer

```bash
composer require alyasi/dashboard-ui
```

أو إذا كنت تريد التثبيت من المستودع المحلي:

```bash
composer require alyasi/dashboard-ui:dev-main
```

### 2. تثبيت ملفات المكتبة

بعد التثبيت، قم بتشغيل أمر التثبيت التلقائي:

```bash
php artisan dashboard-ui:install
```

هذا الأمر سيقوم بـ:
- ✅ نسخ ملفات CSS و JavaScript إلى `public/dashboard-ui/`
- ✅ نسخ ملفات Views إلى `resources/views/vendor/dashboard-ui/`
- ✅ نسخ ملف التكوين إلى `config/dashboard-ui.php`

### 3. استخدام المكتبة

في أي ملف Blade، استخدم التخطيط الأساسي:

```blade
@extends('dashboard-ui::layouts.app')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم')

@section('content')
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">مرحباً</h3>
        </div>
        <div class="card-body">
            <p>محتوى الصفحة هنا...</p>
        </div>
    </div>
@endsection
```

## التثبيت اليدوي (بدون Composer)

### 1. نسخ الملفات

انسخ المجلدات التالية:

```bash
# نسخ Assets
cp -r public/dashboard-ui/ /path/to/your/laravel/project/public/

# نسخ Views
cp -r resources/views/ /path/to/your/laravel/project/resources/views/vendor/dashboard-ui/

# نسخ Config
cp config/dashboard-ui.php /path/to/your/laravel/project/config/
```

### 2. استخدام المكتبة

استخدم التخطيط مباشرة:

```blade
@extends('vendor.dashboard-ui.layouts.app')
```

## الخيارات المتاحة

### تثبيت Assets فقط

```bash
php artisan dashboard-ui:install --assets-only
```

### تثبيت Views فقط

```bash
php artisan dashboard-ui:install --views-only
```

### فرض استبدال الملفات الموجودة

```bash
php artisan dashboard-ui:install --force
```

## استخدام نظام Laravel للنشر

بدلاً من أمر التثبيت، يمكنك استخدام نظام Laravel للنشر:

### نشر جميع الملفات

```bash
php artisan vendor:publish --provider="Alyasi\DashboardUI\DashboardUIServiceProvider"
```

### نشر Assets فقط

```bash
php artisan vendor:publish --provider="Alyasi\DashboardUI\DashboardUIServiceProvider" --tag=dashboard-ui-assets
```

### نشر Views فقط

```bash
php artisan vendor:publish --provider="Alyasi\DashboardUI\DashboardUIServiceProvider" --tag=dashboard-ui-views
```

### نشر ملف التكوين فقط

```bash
php artisan vendor:publish --provider="Alyasi\DashboardUI\DashboardUIServiceProvider" --tag=dashboard-ui-config
```

## استخدام Helper Functions

المكتبة توفر وظائف مساعدة:

```php
// الحصول على مسار ملف CSS
dashboard_ui_css('dashboard.css');

// الحصول على مسار ملف JavaScript
dashboard_ui_js('dashboard.js');

// الحصول على مسار أي ملف أصل
dashboard_ui_asset('css/dashboard.css');

// الحصول على مسار View
dashboard_ui_view('layouts.app');
```

## التكوين

بعد التثبيت، يمكنك تخصيص الإعدادات في ملف `config/dashboard-ui.php`:

```php
return [
    'assets_path' => 'dashboard-ui',
    'views_path' => 'vendor.dashboard-ui',
    'layout' => 'layouts.app',
    // ... المزيد من الإعدادات
];
```

أو عبر ملف `.env`:

```env
DASHBOARD_UI_ASSETS_PATH=dashboard-ui
DASHBOARD_UI_VIEWS_PATH=vendor.dashboard-ui
DASHBOARD_UI_PRIMARY_COLOR=#6366f1
```

## التحديث

عند تحديث المكتبة:

```bash
composer update alyasi/dashboard-ui
php artisan dashboard-ui:install --force
```

## استكشاف الأخطاء

### الملفات لا تظهر

1. تأكد من تشغيل `php artisan config:clear`
2. تأكد من تشغيل `php artisan view:clear`
3. تأكد من أن المسارات في ملف التكوين صحيحة

### الأوامر لا تعمل

1. تأكد من تسجيل Service Provider في `config/app.php`
2. تأكد من أن Auto-discovery يعمل (Laravel 5.5+)
3. قم بتشغيل `composer dump-autoload`

## الدعم

للمزيد من المعلومات، راجع:
- [DASHBOARD_UI_README.md](./DASHBOARD_UI_README.md)
- [INTEGRATION_GUIDE.md](./INTEGRATION_GUIDE.md)
