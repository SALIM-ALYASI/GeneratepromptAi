/**
 * Dashboard UI Library - Main JavaScript File
 * مكتبة واجهات التحكم - ملف JavaScript الرئيسي
 * 
 * This file contains all the interactive functionality for the dashboard UI library
 * يحتوي هذا الملف على جميع الوظائف التفاعلية لمكتبة واجهات التحكم
 */

(function() {
    'use strict';

    /**
     * Dashboard UI Controller
     * متحكم واجهات لوحة التحكم
     */
    class DashboardUI {
        constructor() {
            this.sidebar = document.querySelector('.dashboard-sidebar');
            this.sidebarToggle = document.querySelector('.sidebar-toggle');
            this.mobileToggle = document.querySelector('.navbar-mobile-toggle');
            this.sidebarLinks = document.querySelectorAll('.sidebar-nav-link');
            this.isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            this.isMobile = window.innerWidth <= 768;
            
            this.init();
        }

        /**
         * Initialize all dashboard functionality
         * تهيئة جميع وظائف لوحة التحكم
         */
        init() {
            this.setupSidebar();
            this.setupMobileToggle();
            this.setupActiveLinks();
            this.setupResizeHandler();
            this.setupDropdowns();
        }

        /**
         * Setup sidebar toggle functionality
         * إعداد وظيفة تبديل القائمة الجانبية
         */
        setupSidebar() {
            if (!this.sidebar || !this.sidebarToggle) return;

            // Apply saved state
            if (this.isCollapsed && !this.isMobile) {
                this.sidebar.classList.add('collapsed');
            }

            // Toggle sidebar on button click
            this.sidebarToggle.addEventListener('click', () => {
                this.toggleSidebar();
            });
        }

        /**
         * Toggle sidebar collapsed state
         * تبديل حالة طي القائمة الجانبية
         */
        toggleSidebar() {
            if (this.isMobile) {
                this.toggleMobileSidebar();
            } else {
                this.sidebar.classList.toggle('collapsed');
                this.isCollapsed = this.sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebarCollapsed', this.isCollapsed);
            }
        }

        /**
         * Toggle mobile sidebar
         * تبديل القائمة الجانبية على الجوال
         */
        toggleMobileSidebar() {
            if (this.sidebar) {
                this.sidebar.classList.toggle('mobile-open');
            }
        }

        /**
         * Setup mobile toggle button
         * إعداد زر التبديل على الجوال
         */
        setupMobileToggle() {
            if (!this.mobileToggle) return;

            this.mobileToggle.addEventListener('click', () => {
                this.toggleMobileSidebar();
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (this.isMobile && 
                    this.sidebar && 
                    this.sidebar.classList.contains('mobile-open') &&
                    !this.sidebar.contains(e.target) &&
                    !this.mobileToggle.contains(e.target)) {
                    this.sidebar.classList.remove('mobile-open');
                }
            });
        }

        /**
         * Setup active link highlighting
         * إعداد تمييز الرابط النشط
         */
        setupActiveLinks() {
            // Set active link based on current URL
            const currentPath = window.location.pathname;
            
            this.sidebarLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href && currentPath.includes(href)) {
                    link.classList.add('active');
                }

                // Update active state on click
                link.addEventListener('click', () => {
                    this.sidebarLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                });
            });
        }

        /**
         * Handle window resize
         * التعامل مع تغيير حجم النافذة
         */
        setupResizeHandler() {
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    const wasMobile = this.isMobile;
                    this.isMobile = window.innerWidth <= 768;

                    // If switching from mobile to desktop, restore collapsed state
                    if (wasMobile && !this.isMobile && this.sidebar) {
                        this.sidebar.classList.remove('mobile-open');
                        if (this.isCollapsed) {
                            this.sidebar.classList.add('collapsed');
                        } else {
                            this.sidebar.classList.remove('collapsed');
                        }
                    }

                    // If switching from desktop to mobile, remove collapsed class
                    if (!wasMobile && this.isMobile && this.sidebar) {
                        this.sidebar.classList.remove('collapsed');
                        this.sidebar.classList.remove('mobile-open');
                    }
                }, 250);
            });
        }

        /**
         * Setup dropdown menus (if any)
         * إعداد القوائم المنسدلة (إن وجدت)
         */
        setupDropdowns() {
            const dropdowns = document.querySelectorAll('[data-dropdown]');
            
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('[data-dropdown-toggle]');
                const menu = dropdown.querySelector('[data-dropdown-menu]');
                
                if (toggle && menu) {
                    toggle.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const isOpen = dropdown.classList.contains('open');
                        
                        // Close all other dropdowns
                        dropdowns.forEach(d => d.classList.remove('open'));
                        
                        // Toggle current dropdown
                        if (!isOpen) {
                            dropdown.classList.add('open');
                        }
                    });
                }
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', () => {
                dropdowns.forEach(d => d.classList.remove('open'));
            });
        }
    }

    /**
     * Notification System
     * نظام الإشعارات
     */
    class NotificationSystem {
        constructor() {
            this.container = null;
            this.createContainer();
        }

        /**
         * Create notification container
         * إنشاء حاوية الإشعارات
         */
        createContainer() {
            this.container = document.createElement('div');
            this.container.className = 'notification-container';
            this.container.style.cssText = `
                position: fixed;
                top: 80px;
                right: 20px;
                z-index: 10000;
                display: flex;
                flex-direction: column;
                gap: 10px;
                max-width: 400px;
            `;
            document.body.appendChild(this.container);
        }

        /**
         * Show notification
         * عرض إشعار
         */
        show(message, type = 'info', duration = 3000) {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.style.cssText = `
                background: white;
                padding: 16px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                display: flex;
                align-items: center;
                gap: 12px;
                animation: slideInRight 0.3s ease;
                border-left: 4px solid ${this.getColor(type)};
            `;

            const icon = this.getIcon(type);
            notification.innerHTML = `
                <span style="font-size: 20px;">${icon}</span>
                <span style="flex: 1; color: #111827; font-size: 14px;">${message}</span>
                <button class="notification-close" style="background: none; border: none; cursor: pointer; color: #6b7280; font-size: 18px;">&times;</button>
            `;

            this.container.appendChild(notification);

            // Close button
            const closeBtn = notification.querySelector('.notification-close');
            closeBtn.addEventListener('click', () => {
                this.remove(notification);
            });

            // Auto remove
            if (duration > 0) {
                setTimeout(() => {
                    this.remove(notification);
                }, duration);
            }

            return notification;
        }

        /**
         * Remove notification
         * إزالة إشعار
         */
        remove(notification) {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }

        /**
         * Get color for notification type
         * الحصول على اللون حسب نوع الإشعار
         */
        getColor(type) {
            const colors = {
                success: '#10b981',
                error: '#ef4444',
                warning: '#f59e0b',
                info: '#3b82f6'
            };
            return colors[type] || colors.info;
        }

        /**
         * Get icon for notification type
         * الحصول على الأيقونة حسب نوع الإشعار
         */
        getIcon(type) {
            const icons = {
                success: '✓',
                error: '✕',
                warning: '⚠',
                info: 'ℹ'
            };
            return icons[type] || icons.info;
        }
    }

    /**
     * Add CSS animations
     * إضافة رسوم متحركة CSS
     */
    function addAnimations() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Initialize when DOM is ready
     * التهيئة عند جاهزية DOM
     */
    function init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                addAnimations();
                window.DashboardUI = new DashboardUI();
                window.Notification = new NotificationSystem();
            });
        } else {
            addAnimations();
            window.DashboardUI = new DashboardUI();
            window.Notification = new NotificationSystem();
        }
    }

    // Initialize
    init();

})();

/**
 * Utility Functions
 * وظائف مساعدة
 */

// Show success notification
function showSuccess(message, duration) {
    if (window.Notification) {
        return window.Notification.show(message, 'success', duration);
    }
}

// Show error notification
function showError(message, duration) {
    if (window.Notification) {
        return window.Notification.show(message, 'error', duration);
    }
}

// Show warning notification
function showWarning(message, duration) {
    if (window.Notification) {
        return window.Notification.show(message, 'warning', duration);
    }
}

// Show info notification
function showInfo(message, duration) {
    if (window.Notification) {
        return window.Notification.show(message, 'info', duration);
    }
}
