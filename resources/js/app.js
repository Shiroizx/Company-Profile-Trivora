document.addEventListener('DOMContentLoaded', () => {
    const nav = document.getElementById('main-nav');
    const menuBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.querySelectorAll('[data-nav-link]');

    const profileSections = new Set([
        'tentang',
        'filosofi',
        'visi-misi',
        'nilai',
        'prime',
        'struktur',
        'komitmen',
    ]);

    const kontakSections = new Set(['hubungi-kami', 'lokasi']);

    const setNavScrolled = () => {
        if (!nav) return;
        nav.classList.toggle('nav-scrolled', window.scrollY > 40);
    };

    setNavScrolled();
    window.addEventListener('scroll', setNavScrolled, { passive: true });

    menuBtn?.addEventListener('click', () => {
        const open = mobileMenu?.classList.toggle('menu-open') ?? false;
        menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        menuBtn.classList.toggle('menu-open', open);
    });

    navLinks.forEach((link) => {
        link.addEventListener('click', () => {
            mobileMenu?.classList.remove('menu-open');
            menuBtn?.setAttribute('aria-expanded', 'false');
        });
    });

    const setActiveNav = (id) => {
        document.querySelectorAll('[data-nav-link]').forEach((el) => {
            const isDirect = el.getAttribute('href') === `#${id}`;
            el.classList.toggle('is-active', isDirect);
        });

        document.querySelectorAll('[data-dropdown-trigger]').forEach((trigger) => {
            const group = trigger.closest('[data-nav-group]')?.getAttribute('data-nav-group');
            const active =
                (group === 'profile' && profileSections.has(id)) ||
                (group === 'kontak' && kontakSections.has(id));
            trigger.classList.toggle('is-active', active);
        });
    };

    const sections = document.querySelectorAll('section[id]');
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const id = entry.target.getAttribute('id');
                if (id) setActiveNav(id);
            });
        },
        { rootMargin: '-40% 0px -55% 0px', threshold: 0 }
    );

    sections.forEach((section) => observer.observe(section));
});
