# استكشاف الأخطاء - Troubleshooting Guide

## المشكلة: "There are no commands defined in the "dashboard-ui" namespace"

### الحلول:

#### 1. التأكد من تثبيت المكتبة بشكل صحيح

```bash
# في مشروع Laravel الخاص بك
composer require alyasi/dashboard-ui:dev-main --repository='{"type":"vcs","url":"https://github.com/SALIM-ALYASI/GeneratepromptAi.git"}'
```

أو أضف في `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/SALIM-ALYASI/GeneratepromptAi.git"
        }
    ],
    "require": {
        "alyasi/dashboard-ui": "dev-main"
    }
}
```

#### 2. إعادة تحميل Autoload

```bash
composer dump-autoload
```

#### 3. مسح Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

#### 4. التحقق من تسجيل Service Provider

**الطريقة 1: Auto-Discovery (Laravel 5.5+)**

تأكد من أن `composer.json` في المكتبة يحتوي على:

```json
{
    "extra": {
        "laravel": {
            "providers": [
                "Alyasi\\DashboardUI\\DashboardUIServiceProvider"
            ]
        }
    }
}
```

**الطريقة 2: التسجيل اليدوي**

إذا لم يعمل Auto-Discovery، أضف في `config/app.php`:

```php
'providers' => [
    // ...
    Alyasi\DashboardUI\DashboardUIServiceProvider::class,
],
```

#### 5. التحقق من الأوامر

```bash
# عرض جميع الأوامر
php artisan list

# البحث عن أوامر dashboard-ui
php artisan list | grep dashboard-ui

# أو
php artisan list dashboard-ui
```

#### 6. التحقق من مسار الملفات

تأكد من أن الملفات موجودة في:
- `vendor/alyasi/dashboard-ui/src/DashboardUIServiceProvider.php`
- `vendor/alyasi/dashboard-ui/src/Commands/InstallCommand.php`
- `vendor/alyasi/dashboard-ui/src/Commands/PublishCommand.php`

## المشكلة: "Could not find a matching version of package alyasi/dashboard-ui"

### الحل:

المكتبة غير متاحة على Packagist. استخدم المستودع من GitHub:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/SALIM-ALYASI/GeneratepromptAi.git"
        }
    ],
    "require": {
        "alyasi/dashboard-ui": "dev-main"
    }
}
```

## المشكلة: الأوامر لا تعمل بعد التثبيت

### خطوات الحل:

1. **إعادة تحميل Composer:**
   ```bash
   composer dump-autoload
   ```

2. **مسح جميع الـ Cache:**
   ```bash
   php artisan optimize:clear
   ```

3. **إعادة تشغيل الخادم (إن أمكن):**
   ```bash
   php artisan serve
   ```

4. **التحقق من الإصدار:**
   ```bash
   php artisan --version
   composer --version
   ```

## المشكلة: الملفات لا تنسخ عند تشغيل الأمر

### الحل:

1. **التحقق من الصلاحيات:**
   ```bash
   # في Linux/Mac
   chmod -R 775 storage bootstrap/cache
   chmod -R 775 public
   ```

2. **استخدام --force:**
   ```bash
   php artisan dashboard-ui:install --force
   ```

3. **التحقق من المسارات:**
   - `public/dashboard-ui/` يجب أن يكون قابل للكتابة
   - `resources/views/vendor/dashboard-ui/` يجب أن يكون قابل للكتابة

## المشكلة: Views لا تظهر

### الحل:

1. **التحقق من مسار Views:**
   ```bash
   php artisan view:clear
   ```

2. **استخدام المسار الصحيح:**
   ```blade
   @extends('dashboard-ui::layouts.app')
   ```

3. **التحقق من نشر Views:**
   ```bash
   php artisan dashboard-ui:install --views-only
   ```

## المشكلة: Assets (CSS/JS) لا تظهر

### الحل:

1. **التحقق من المسار:**
   ```bash
   ls -la public/dashboard-ui/
   ```

2. **إعادة تثبيت Assets:**
   ```bash
   php artisan dashboard-ui:install --assets-only --force
   ```

3. **التحقق من ملف .htaccess (إذا كان Apache):**
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteRule ^(.*)$ public/$1 [L]
   </IfModule>
   ```

4. **تشغيل Laravel Mix/Vite:**
   ```bash
   npm run dev
   # أو
   npm run build
   ```

## المشكلة: Helper Functions لا تعمل

### الحل:

1. **إعادة تحميل Autoload:**
   ```bash
   composer dump-autoload
   ```

2. **التحقق من تحميل الملف:**
   ```php
   // في tinker
   php artisan tinker
   >>> function_exists('dashboard_ui_asset')
   // يجب أن يرجع true
   ```

3. **استخدام Namespace كامل:**
   ```php
   use function Alyasi\DashboardUI\dashboard_ui_asset;
   ```

## سجلات الأخطاء

### عرض سجلات Laravel:

```bash
tail -f storage/logs/laravel.log
```

### عرض أخطاء Composer:

```bash
composer install -vvv
```

## التحقق من التثبيت الصحيح

قم بتشغيل هذا الأمر للتحقق:

```bash
# 1. التحقق من تثبيت المكتبة
composer show alyasi/dashboard-ui

# 2. التحقق من الأوامر
php artisan list dashboard-ui

# 3. التحقق من Service Provider
php artisan route:list | grep dashboard-ui

# 4. التحقق من الملفات
ls -la vendor/alyasi/dashboard-ui/
ls -la public/dashboard-ui/
ls -la resources/views/vendor/dashboard-ui/
```

## الحصول على المساعدة

إذا استمرت المشاكل:

1. راجع [USAGE_FROM_GITHUB.md](./USAGE_FROM_GITHUB.md)
2. راجع [INSTALLATION.md](./INSTALLATION.md)
3. راجع [AUTO_INSTALL_SYSTEM.md](./AUTO_INSTALL_SYSTEM.md)

## معلومات النظام

عند طلب المساعدة، قدم هذه المعلومات:

```bash
php --version
composer --version
php artisan --version
composer show alyasi/dashboard-ui
```
