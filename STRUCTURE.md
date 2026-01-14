# بنية المشروع - Project Structure

```
GeneratepromptAi/
│
├── src/                             # كود PHP للمكتبة (Library PHP Code)
│   ├── DashboardUIServiceProvider.php  # Service Provider الرئيسي
│   ├── Commands/                    # أوامر Artisan
│   │   ├── InstallCommand.php       # أمر التثبيت التلقائي
│   │   └── PublishCommand.php       # أمر النشر
│   └── helpers.php                  # وظائف مساعدة (Helper Functions)
│
├── config/                          # ملفات التكوين
│   └── dashboard-ui.php            # إعدادات المكتبة
│
├── public/                          # الملفات العامة (Public Assets)
│   └── dashboard-ui/                # مجلد مكتبة Dashboard UI
│       ├── css/
│       │   ├── dashboard.css        # ملف الأنماط الرئيسي (جميع أنماط المكتبة)
│       │   └── icons.css            # أنماط دعم الأيقونات الخارجية
│       └── js/
│           └── dashboard.js         # ملف JavaScript الرئيسي (الوظائف التفاعلية)
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # ملف التخطيط الأساسي (Layout)
│       └── dashboard/
│           └── example.blade.php    # مثال على استخدام المكتبة
│
├── composer.json                    # تعريف Composer Package
├── .gitignore                       # ملف Git Ignore
│
├── DASHBOARD_UI_README.md           # دليل الاستخدام الكامل بالعربية
├── INSTALLATION.md                  # دليل التثبيت التفصيلي
├── AUTO_INSTALL_SYSTEM.md           # دليل نظام التثبيت التلقائي
├── INTEGRATION_GUIDE.md             # دليل التكامل السريع
├── STRUCTURE.md                     # هذا الملف - بنية المشروع
└── README.md                        # ملف README الرئيسي
```

## وصف الملفات

### ملفات PHP (Library Code)

- **`src/DashboardUIServiceProvider.php`**: Service Provider الرئيسي الذي يقوم بـ:
  - تسجيل المكتبة في Laravel
  - نشر الملفات (Assets, Views, Config)
  - تحميل Views
  - تسجيل الأوامر (Commands)
  - تحميل ملفات المساعدة

- **`src/Commands/InstallCommand.php`**: أمر التثبيت التلقائي الذي يقوم بـ:
  - نسخ ملفات CSS و JavaScript إلى `public/dashboard-ui/`
  - نسخ ملفات Views إلى `resources/views/vendor/dashboard-ui/`
  - نسخ ملف التكوين إلى `config/dashboard-ui.php`
  - التحقق من وجود الملفات وطلب التأكيد

- **`src/Commands/PublishCommand.php`**: أمر النشر الذي يستخدم نظام Laravel القياسي للنشر

- **`src/helpers.php`**: وظائف مساعدة:
  - `dashboard_ui_asset()` - الحصول على مسار ملف أصل
  - `dashboard_ui_css()` - الحصول على مسار ملف CSS
  - `dashboard_ui_js()` - الحصول على مسار ملف JavaScript
  - `dashboard_ui_view()` - الحصول على مسار View

### ملفات التكوين

- **`config/dashboard-ui.php`**: ملف التكوين الرئيسي يحتوي على:
  - إعدادات المسارات (Assets, Views)
  - إعدادات القائمة الجانبية
  - إعدادات الشريط العلوي
  - إعدادات المظهر والألوان

- **`composer.json`**: تعريف Composer Package يحتوي على:
  - معلومات الحزمة
  - المتطلبات
  - Auto-discovery للـ Service Provider
  - Autoloading

### ملفات CSS

- **`dashboard.css`**: يحتوي على جميع الأنماط الأساسية للمكتبة:
  - المتغيرات CSS (الألوان، المسافات، الظلال)
  - أنماط القائمة الجانبية (Sidebar)
  - أنماط الشريط العلوي (Navbar)
  - أنماط البطاقات (Cards)
  - التصميم المتجاوب (Responsive)
  - الفئات المساعدة (Utility Classes)

- **`icons.css`**: أنماط إضافية لدعم مكتبات الأيقونات الخارجية مثل Font Awesome و Heroicons

### ملفات JavaScript

- **`dashboard.js`**: يحتوي على:
  - فئة `DashboardUI` للتحكم في القائمة الجانبية
  - نظام الإشعارات (`NotificationSystem`)
  - وظائف مساعدة للإشعارات
  - معالجة الأحداث والتفاعلات

### ملفات Blade

- **`app.blade.php`**: ملف التخطيط الأساسي الذي يحتوي على:
  - الهيكل الأساسي للصفحة
  - القائمة الجانبية
  - الشريط العلوي
  - منطقة المحتوى
  - تضمين ملفات CSS و JavaScript

- **`example.blade.php`**: مثال عملي يوضح:
  - كيفية استخدام المكتبة
  - كيفية إضافة بطاقات
  - كيفية استخدام نظام الإشعارات
  - كيفية تخصيص المحتوى

### ملفات التوثيق

- **`DASHBOARD_UI_README.md`**: دليل شامل بالعربية يتضمن:
  - المميزات
  - خطوات التثبيت
  - أمثلة الاستخدام
  - التخصيص والتوسيع

- **`INTEGRATION_GUIDE.md`**: دليل سريع للتكامل يتضمن:
  - إضافة مكتبات الأيقونات
  - تخصيص الألوان
  - إضافة صفحات جديدة
  - استخدام نظام الإشعارات مع Laravel

## كيفية الاستخدام

### الطريقة 1: التثبيت التلقائي (موصى بها)

```bash
# 1. تثبيت المكتبة
composer require alyasi/dashboard-ui

# 2. تثبيت الملفات تلقائياً
php artisan dashboard-ui:install

# 3. استخدام المكتبة
# في ملف Blade:
@extends('dashboard-ui::layouts.app')
```

### الطريقة 2: التثبيت اليدوي

1. **انسخ الملفات** إلى مشروع Laravel الخاص بك
2. **استخدم** `app.blade.php` كتخطيط أساسي
3. **راجع** `INSTALLATION.md` للتعليمات التفصيلية

## نظام التثبيت التلقائي

المكتبة تحتوي على نظام تثبيت تلقائي متكامل:

1. **Auto-Discovery**: تسجيل تلقائي في Laravel (Laravel 5.5+)
2. **Service Provider**: تسجيل تلقائي للخدمات والأوامر
3. **Install Command**: تثبيت جميع الملفات بنقرة واحدة
4. **Helper Functions**: وظائف مساعدة جاهزة للاستخدام

راجع [AUTO_INSTALL_SYSTEM.md](./AUTO_INSTALL_SYSTEM.md) للتفاصيل الكاملة.

## المسارات المهمة

### بعد التثبيت التلقائي

- ملفات CSS: `public/dashboard-ui/css/`
- ملفات JS: `public/dashboard-ui/js/`
- ملف Layout: `resources/views/vendor/dashboard-ui/layouts/app.blade.php`
- مثال الاستخدام: `resources/views/vendor/dashboard-ui/dashboard/example.blade.php`
- ملف التكوين: `config/dashboard-ui.php`

### في الكود المصدر

- ملفات CSS: `public/dashboard-ui/css/`
- ملفات JS: `public/dashboard-ui/js/`
- ملف Layout: `resources/views/layouts/app.blade.php`
- مثال الاستخدام: `resources/views/dashboard/example.blade.php`

## الأوامر المتاحة

```bash
# تثبيت جميع الملفات
php artisan dashboard-ui:install

# تثبيت Assets فقط
php artisan dashboard-ui:install --assets-only

# تثبيت Views فقط
php artisan dashboard-ui:install --views-only

# فرض استبدال الملفات
php artisan dashboard-ui:install --force

# نشر الملفات (طريقة Laravel القياسية)
php artisan dashboard-ui:publish
```

## ملاحظات

- جميع الملفات تحتوي على تعليقات بالعربية والإنجليزية
- المكتبة مصممة لتكون سهلة التكامل والتخصيص
- لا تحتاج إلى أي dependencies خارجية (باستثناء خط Inter من Google Fonts)
- متوافقة مع Laravel 8.x وأحدث
- تدعم Auto-Discovery في Laravel 5.5+
- نظام تثبيت تلقائي موثوق وسلس
