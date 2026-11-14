import './bootstrap';

import { Alert, Collapse, Dropdown, Modal, Tooltip } from 'bootstrap';

window.bootstrap = { Alert, Collapse, Dropdown, Modal, Tooltip };

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.site-navbar');
    const backTop = document.querySelector('.back-top');

    const onScroll = () => {
        if (navbar) {
            navbar.classList.toggle('scrolled', window.scrollY > 40);
        }
        if (backTop) {
            backTop.classList.toggle('show', window.scrollY > 420);
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (backTop) {
        backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    const sidebar = document.querySelector('.admin-sidebar');
    const backdrop = document.querySelector('.sidebar-backdrop');
    const toggles = document.querySelectorAll('[data-sidebar-toggle]');

    const closeSidebar = () => {
        sidebar?.classList.remove('show');
        backdrop?.classList.remove('show');
    };

    toggles.forEach((toggle) => {
        toggle.addEventListener('click', () => {
            sidebar?.classList.toggle('show');
            backdrop?.classList.toggle('show');
        });
    });

    backdrop?.addEventListener('click', closeSidebar);

    document.querySelectorAll('[data-confirm]').forEach((el) => {
        el.addEventListener('submit', (e) => {
            if (!window.confirm(el.dataset.confirm || 'Yakin melanjutkan aksi ini?')) {
                e.preventDefault();
            }
        });
    });

    window.setTimeout(() => {
        document.querySelectorAll('.alert-dismissible').forEach((alert) => {
            const btn = alert.querySelector('.btn-close');
            if (btn) {
                window.bootstrap?.Alert?.getOrCreateInstance(alert)?.close();
            }
        });
    }, 5000);
});
