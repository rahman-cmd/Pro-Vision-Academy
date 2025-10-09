<!-- Sidebar -->
<div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 sidebar-transition z-40 overflow-y-auto sidebar-mobile">
    <div class="p-3 sm:p-4">
        <!-- Student Info -->
        <div class="bg-blue-50 rounded-lg p-3 sm:p-4 mb-4 sm:mb-6">
            <div class="flex items-center space-x-2 sm:space-x-3">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-white text-sm sm:text-lg"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <h3 class="font-semibold text-gray-800 text-sm sm:text-base truncate">John Doe</h3>
                    <p class="text-xs sm:text-sm text-gray-600 truncate">Student ID: ST001</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="space-y-1 sm:space-y-2">
            <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-tachometer-alt w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Dashboard</span>
            </a>
            
            <a href="{{ route('student.courses') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.courses*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-book w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">My Courses</span>
            </a>
            
            <a href="{{ route('student.schedule') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.schedule') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-calendar-alt w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Class Schedule</span>
            </a>
            
            <a href="{{ route('student.attendance') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.attendance') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-check-circle w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Attendance</span>
            </a>
            
            <a href="{{ route('student.assignments') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.assignments*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-tasks w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Assignments</span>
            </a>
            
            <a href="{{ route('student.grades') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.grades') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-chart-line w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Grades</span>
            </a>
            
            <a href="{{ route('student.certificates') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.certificates') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-certificate w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Certificates</span>
            </a>
            
            <div class="border-t border-gray-200 my-3 sm:my-4"></div>
            
            <a href="{{ route('student.profile') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.profile') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-user-edit w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Profile</span>
            </a>
            
            <a href="{{ route('student.settings') }}" class="flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors {{ request()->routeIs('student.settings') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-cog w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                <span class="text-sm sm:text-base truncate">Settings</span>
            </a>
        </nav>
        
        <!-- Mobile-only logout button -->
        <div class="lg:hidden mt-4 pt-4 border-t border-gray-200">
            <form action="{{ route('student.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-2 sm:space-x-3 px-3 sm:px-4 py-2 sm:py-3 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                    <i class="fas fa-sign-out-alt w-4 sm:w-5 text-sm sm:text-base flex-shrink-0"></i>
                    <span class="text-sm sm:text-base truncate">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Sidebar Overlay for Mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden transition-opacity duration-300"></div>

<script>
    // Sidebar toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
            
            // Prevent body scroll when sidebar is open on mobile
            if (window.innerWidth < 1024) {
                document.body.classList.toggle('overflow-hidden');
            }
        }
        
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', toggleSidebar);
        }
        
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }
        
        // Close sidebar when clicking on navigation links on mobile
        const navLinks = sidebar.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    closeSidebar();
                }
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                document.body.classList.remove('overflow-hidden');
                sidebarOverlay.classList.add('hidden');
            }
        });
    });
</script>