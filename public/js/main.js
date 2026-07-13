document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('mobile-menu-btn');
    var menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', function () {
            var open = menu.classList.toggle('hidden') === false;
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    var nav = document.getElementById('site-nav');
    if (nav) {
        var onScroll = function () {
            nav.classList.toggle('is-scrolled', window.scrollY > 18);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    var tabPartners = document.getElementById('tab-partners');
    var tabFaculty = document.getElementById('tab-faculty');
    var contentPartners = document.getElementById('tab-content-partners');
    var contentFaculty = document.getElementById('tab-content-faculty');
    if (tabPartners && tabFaculty && contentPartners && contentFaculty) {
        var activate = function (activeTab, inactiveTab, showEl, hideEl) {
            activeTab.classList.add('is-active');
            inactiveTab.classList.remove('is-active');
            showEl.classList.remove('hidden');
            hideEl.classList.add('hidden');
        };
        tabPartners.addEventListener('click', function () {
            activate(tabPartners, tabFaculty, contentPartners, contentFaculty);
        });
        tabFaculty.addEventListener('click', function () {
            activate(tabFaculty, tabPartners, contentFaculty, contentPartners);
        });
    }

    var reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window && reveals.length) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

        reveals.forEach(function (el) {
            observer.observe(el);
        });
    } else {
        reveals.forEach(function (el) {
            el.classList.add('is-visible');
        });
    }
});
