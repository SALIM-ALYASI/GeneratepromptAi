# دليل التكامل السريع - Quick Integration Guide

## إضافة مكتبات الأيقونات

### استخدام Font Awesome

1. أضف Font Awesome في ملف `app.blade.php`:

```blade
<!-- في قسم <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

2. استخدم الأيقونات في القائمة الجانبية:

```blade
<div class="sidebar-nav-item">
    <a href="{{ url('/dashboard') }}" class="sidebar-nav-link">
        <span class="sidebar-nav-icon">
            <i class="fas fa-home"></i>
        </span>
        <span class="sidebar-nav-text">الرئيسية</span>
    </a>
</div>
```

### استخدام Heroicons

1. أضف Heroicons في ملف `app.blade.php`:

```blade
<!-- في قسم <head> -->
<script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.6/dist/heroicons.min.js"></script>
```

2. استخدم الأيقونات:

```blade
<span class="sidebar-nav-icon">
    <svg class="heroicon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
    </svg>
</span>
```

## تخصيص الألوان

### تغيير اللون الأساسي

في ملف `public/dashboard-ui/css/dashboard.css`، قم بتعديل المتغيرات:

```css
:root {
    --primary-color: #6366f1;  /* غير هذا اللون */
    --primary-dark: #4f46e5;   /* واللون الداكن */
    --primary-light: #818cf8;  /* واللون الفاتح */
}
```

### استخدام نظام ألوان مخصص

```css
:root {
    /* نظام ألوان أزرق */
    --primary-color: #3b82f6;
    --primary-dark: #2563eb;
    
    /* أو نظام ألوان أخضر */
    --primary-color: #10b981;
    --primary-dark: #059669;
    
    /* أو نظام ألوان بنفسجي */
    --primary-color: #8b5cf6;
    --primary-dark: #7c3aed;
}
```

## إضافة صفحات جديدة

### 1. إنشاء Route

في ملف `routes/web.php`:

```php
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
```

### 2. إنشاء View

في ملف `resources/views/dashboard/index.blade.php`:

```blade
@extends('layouts.app')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم')
@section('page-subtitle', 'مرحباً بك في لوحة التحكم')

@section('content')
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">محتوى الصفحة</h3>
        </div>
        <div class="card-body">
            <p>محتوى صفحتك هنا...</p>
        </div>
    </div>
@endsection
```

## استخدام نظام الإشعارات مع Laravel

### في Controller

```php
public function store(Request $request)
{
    // معالجة البيانات...
    
    return redirect()->back()->with('success', 'تم الحفظ بنجاح!');
}
```

### في Blade Template

```blade
@if(session('success'))
    @push('scripts')
        <script>
            showSuccess('{{ session('success') }}');
        </script>
    @endpush
@endif

@if(session('error'))
    @push('scripts')
        <script>
            showError('{{ session('error') }}');
        </script>
    @endpush
@endif
```

## إضافة Authentication

### تحديث Navbar User Info

في ملف `app.blade.php`، استخدم بيانات المستخدم من Laravel:

```blade
<div class="navbar-user">
    <div class="navbar-user-avatar">
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
    </div>
    <div class="navbar-user-info">
        <div class="navbar-user-name">{{ auth()->user()->name }}</div>
        <div class="navbar-user-role">{{ auth()->user()->role ?? 'مستخدم' }}</div>
    </div>
</div>
```

## إضافة Dropdown Menus

### مثال على Dropdown للإشعارات

```blade
<div class="navbar-item" data-dropdown>
    <button class="navbar-icon-btn" data-dropdown-toggle>
        <span>🔔</span>
        <span class="navbar-badge">3</span>
    </button>
    <div data-dropdown-menu style="display: none; position: absolute; top: 100%; right: 0; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); min-width: 300px; margin-top: 8px;">
        <div style="padding: 1rem; border-bottom: 1px solid #e5e7eb;">
            <h4 style="margin: 0; font-size: 0.875rem; font-weight: 600;">الإشعارات</h4>
        </div>
        <div style="max-height: 400px; overflow-y: auto;">
            <!-- قائمة الإشعارات -->
        </div>
    </div>
</div>
```

## نصائح الأداء

1. **استخدم CDN للأيقونات** لتسريع التحميل
2. **قم بضغط ملفات CSS و JS** في الإنتاج
3. **استخدم Laravel Mix أو Vite** لدمج الملفات
4. **قم بتخزين الحالة** في localStorage (مدمج تلقائياً)

## استكشاف الأخطاء

### الملفات لا تظهر

تأكد من:
- تشغيل `php artisan serve` أو إعداد الخادم بشكل صحيح
- أن المسارات في `asset()` صحيحة
- أن الملفات موجودة في المجلدات الصحيحة

### القائمة الجانبية لا تعمل

تأكد من:
- تحميل ملف `dashboard.js` بشكل صحيح
- عدم وجود أخطاء JavaScript في Console
- أن العناصر لها الـ classes الصحيحة

### الألوان لا تتغير

تأكد من:
- تعديل المتغيرات في `:root`
- عدم وجود أنماط أخرى تتجاوز الأنماط المخصصة
- مسح cache المتصفح

---

للمزيد من التفاصيل، راجع [DASHBOARD_UI_README.md](./DASHBOARD_UI_README.md)
