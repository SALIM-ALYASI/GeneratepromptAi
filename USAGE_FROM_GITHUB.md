# استخدام المكتبة من GitHub مباشرة

بما أن المكتبة غير متاحة على Packagist حالياً، يمكنك استخدامها مباشرة من GitHub.

## الطريقة 1: إضافة المستودع في composer.json

في مشروع Laravel الخاص بك، أضف المستودع في ملف `composer.json`:

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

ثم قم بتشغيل:

```bash
composer update
```

## الطريقة 2: التثبيت المباشر

```bash
composer require alyasi/dashboard-ui:dev-main --repository='{"type":"vcs","url":"https://github.com/SALIM-ALYASI/GeneratepromptAi.git"}'
```

## الطريقة 3: استخدام المسار المحلي (للتطوير)

إذا كان المستودع موجود محلياً:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../GeneratepromptAi"
        }
    ],
    "require": {
        "alyasi/dashboard-ui": "*"
    }
}
```

## بعد التثبيت

بعد تثبيت المكتبة، تأكد من:

1. **تشغيل composer dump-autoload:**
   ```bash
   composer dump-autoload
   ```

2. **مسح Cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

3. **التحقق من الأوامر:**
   ```bash
   php artisan list | grep dashboard-ui
   ```

4. **تثبيت الملفات:**
   ```bash
   php artisan dashboard-ui:install
   ```

## استكشاف الأخطاء

### الخطأ: "There are no commands defined in the "dashboard-ui" namespace"

**الحل:**
1. تأكد من أن Service Provider مسجل:
   ```bash
   composer dump-autoload
   php artisan config:clear
   ```

2. تحقق من ملف `composer.json` في مشروعك:
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

3. إذا لم يعمل Auto-Discovery، أضف Service Provider يدوياً في `config/app.php`:
   ```php
   'providers' => [
       // ...
       Alyasi\DashboardUI\DashboardUIServiceProvider::class,
   ],
   ```

### الخطأ: "Could not find a matching version"

**الحل:**
- استخدم `dev-main` بدلاً من رقم إصدار محدد
- تأكد من إضافة المستودع في `repositories`

### الخطأ: الأوامر لا تعمل

**الحل:**
```bash
# مسح جميع الـ Cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# إعادة تحميل Autoload
composer dump-autoload

# التحقق من الأوامر
php artisan list dashboard-ui
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
