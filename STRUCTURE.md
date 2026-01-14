# بنية المشروع - Project Structure

```
GeneratepromptAi/
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
├── DASHBOARD_UI_README.md           # دليل الاستخدام الكامل بالعربية
├── INTEGRATION_GUIDE.md             # دليل التكامل السريع
├── STRUCTURE.md                     # هذا الملف - بنية المشروع
└── README.md                        # ملف README الرئيسي
```

## وصف الملفات

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

1. **انسخ الملفات** إلى مشروع Laravel الخاص بك
2. **استخدم** `app.blade.php` كتخطيط أساسي
3. **راجع** `DASHBOARD_UI_README.md` للتعليمات التفصيلية
4. **شاهد** `example.blade.php` للأمثلة العملية

## المسارات المهمة

- ملفات CSS: `public/dashboard-ui/css/`
- ملفات JS: `public/dashboard-ui/js/`
- ملف Layout: `resources/views/layouts/app.blade.php`
- مثال الاستخدام: `resources/views/dashboard/example.blade.php`

## ملاحظات

- جميع الملفات تحتوي على تعليقات بالعربية والإنجليزية
- المكتبة مصممة لتكون سهلة التكامل والتخصيص
- لا تحتاج إلى أي dependencies خارجية (باستثناء خط Inter من Google Fonts)
- متوافقة مع Laravel 8.x وأحدث
