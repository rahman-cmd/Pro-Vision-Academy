document.addEventListener('DOMContentLoaded', function() {
    // Mobile nav toggle
    var btn = document.getElementById('mobile-menu-btn');
    var menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
    }

    // Simple tab switcher for Additional Tabs section
    var tabPartners = document.getElementById('tab-partners');
    var tabFaculty = document.getElementById('tab-faculty');
    var contentPartners = document.getElementById('tab-content-partners');
    var contentFaculty = document.getElementById('tab-content-faculty');
    if (tabPartners && tabFaculty && contentPartners && contentFaculty) {
        tabPartners.addEventListener('click', function() {
            tabPartners.classList.add('text-[#19506b]', 'bg-white', 'border-[#19506b]');
            tabPartners.classList.remove('text-gray-500', 'bg-gray-100', 'border-transparent');
            tabFaculty.classList.add('text-gray-500', 'bg-gray-100', 'border-transparent');
            tabFaculty.classList.remove('text-[#19506b]', 'bg-white', 'border-[#19506b]');
            contentPartners.classList.remove('hidden');
            contentFaculty.classList.add('hidden');
        });
        tabFaculty.addEventListener('click', function() {
            tabFaculty.classList.add('text-[#19506b]', 'bg-white', 'border-[#19506b]');
            tabFaculty.classList.remove('text-gray-500', 'bg-gray-100', 'border-transparent');
            tabPartners.classList.add('text-gray-500', 'bg-gray-100', 'border-transparent');
            tabPartners.classList.remove('text-[#19506b]', 'bg-white', 'border-[#19506b]');
            contentFaculty.classList.remove('hidden');
            contentPartners.classList.add('hidden');
        });
    }
});
