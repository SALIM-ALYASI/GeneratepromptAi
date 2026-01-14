{{-- 
    مثال على استخدام مكتبة Dashboard UI
    Example of using Dashboard UI Library
--}}
@extends('layouts.app')

@section('title', 'مثال لوحة التحكم')
@section('page-title', 'لوحة التحكم')
@section('page-subtitle', 'هذه صفحة مثال توضح كيفية استخدام المكتبة')

@section('sidebar-nav')
    {{-- يمكنك إضافة عناصر إضافية للقائمة الجانبية هنا --}}
    <div class="sidebar-nav-item">
        <a href="{{ url('/example') }}" class="sidebar-nav-link">
            <span class="sidebar-nav-icon">📝</span>
            <span class="sidebar-nav-text">مثال</span>
        </a>
    </div>
@endsection

@section('content')
    {{-- بطاقة إحصائيات --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        <div class="dashboard-card">
            <div class="card-body">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.875rem; margin-bottom: 0.5rem;">إجمالي المستخدمين</p>
                        <h2 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin: 0;">1,234</h2>
                    </div>
                    <div style="width: 60px; height: 60px; background: rgba(99, 102, 241, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        👥
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-body">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.875rem; margin-bottom: 0.5rem;">إجمالي المبيعات</p>
                        <h2 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin: 0;">$45,678</h2>
                    </div>
                    <div style="width: 60px; height: 60px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        💰
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="card-body">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.875rem; margin-bottom: 0.5rem;">الطلبات الجديدة</p>
                        <h2 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin: 0;">89</h2>
                    </div>
                    <div style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        📦
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- بطاقة محتوى رئيسية --}}
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">بطاقة مثال</h3>
        </div>
        <div class="card-body">
            <p style="margin-bottom: 1rem;">هذه بطاقة مثال توضح كيفية استخدام مكونات المكتبة. يمكنك إضافة أي محتوى تريده هنا.</p>
            
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button onclick="showSuccess('تم بنجاح!')" style="padding: 0.5rem 1rem; background: var(--success-color); color: white; border: none; border-radius: var(--radius-md); cursor: pointer;">
                    إشعار نجاح
                </button>
                <button onclick="showError('حدث خطأ!')" style="padding: 0.5rem 1rem; background: var(--danger-color); color: white; border: none; border-radius: var(--radius-md); cursor: pointer;">
                    إشعار خطأ
                </button>
                <button onclick="showWarning('تحذير!')" style="padding: 0.5rem 1rem; background: var(--warning-color); color: white; border: none; border-radius: var(--radius-md); cursor: pointer;">
                    إشعار تحذير
                </button>
                <button onclick="showInfo('معلومة')" style="padding: 0.5rem 1rem; background: var(--info-color); color: white; border: none; border-radius: var(--radius-md); cursor: pointer;">
                    إشعار معلومات
                </button>
            </div>
        </div>
    </div>

    {{-- بطاقة أخرى --}}
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">معلومات إضافية</h3>
        </div>
        <div class="card-body">
            <p>يمكنك استخدام الفئات المساعدة المتاحة:</p>
            <ul style="margin-top: 1rem; padding-right: 1.5rem;">
                <li><span class="text-primary">نص باللون الأساسي</span></li>
                <li><span class="text-success">نص باللون الأخضر</span></li>
                <li><span class="text-warning">نص باللون البرتقالي</span></li>
                <li><span class="text-danger">نص باللون الأحمر</span></li>
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // مثال على استخدام JavaScript المخصص
    console.log('Dashboard example page loaded!');
</script>
@endpush
