# حل سريع للمشكلة - Quick Fix

## المشكلة: "There are no commands defined in the "dashboard-ui" namespace"

### الحل السريع (خطوة بخطوة):

#### الخطوة 1: إضافة المستودع في composer.json

في مشروع Laravel الخاص بك (`my-project/composer.json`)، أضف:

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

#### الخطوة 2: تثبيت المكتبة

```bash
cd /path/to/your/my-project
composer update
```

أو مباشرة:

```bash
composer require alyasi/dashboard-ui:dev-main --repository='{"type":"vcs","url":"https://github.com/SALIM-ALYASI/GeneratepromptAi.git"}'
```

#### الخطوة 3: إعادة تحميل Autoload

```bash
composer dump-autoload
```

#### الخطوة 4: مسح Cache

```bash
php artisan config:clear
php artisan cache:clear
```

#### الخطوة 5: التحقق من الأوامر

```bash
php artisan list | grep dashboard-ui
```

يجب أن ترى:
- `dashboard-ui:install`
- `dashboard-ui:publish`

#### الخطوة 6: تشغيل الأمر

```bash
php artisan dashboard-ui:install
```

## إذا لم تعمل الخطوات السابقة:

### الحل البديل: التسجيل اليدوي

أضف Service Provider يدوياً في `config/app.php`:

```php
'providers' => [
    // ...
    Alyasi\DashboardUI\DashboardUIServiceProvider::class,
],
```

ثم:

```bash
php artisan config:clear
php artisan cache:clear
composer dump-autoload
```

## مثال كامل لـ composer.json

```json
{
    "name": "your-project/name",
    "type": "project",
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/SALIM-ALYASI/GeneratepromptAi.git"
        }
    ],
    "require": {
        "php": "^8.0",
        "alyasi/dashboard-ui": "dev-main",
        "laravel/framework": "^10.0"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}
```

## التحقق النهائي

بعد تنفيذ جميع الخطوات، تحقق:

```bash
# 1. التحقق من تثبيت المكتبة
composer show alyasi/dashboard-ui

# 2. عرض الأوامر
php artisan list dashboard-ui

# 3. تشغيل الأمر
php artisan dashboard-ui:install --force
```

## ملاحظات مهمة

1. **تأكد من أن Laravel 8.x أو أحدث**
2. **تأكد من PHP 7.4 أو أحدث**
3. **استخدم `dev-main` وليس رقم إصدار محدد**
4. **أضف المستودع في `repositories` قبل `require`**

## للمزيد من المساعدة

راجع:
- [TROUBLESHOOTING.md](./TROUBLESHOOTING.md) - دليل استكشاف الأخطاء الكامل
- [USAGE_FROM_GITHUB.md](./USAGE_FROM_GITHUB.md) - استخدام المكتبة من GitHub
- [INSTALLATION.md](./INSTALLATION.md) - دليل التثبيت التفصيلي
