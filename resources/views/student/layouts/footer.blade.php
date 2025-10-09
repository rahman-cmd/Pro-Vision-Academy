</div>
    
    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 lg:ml-64">
        <div class="px-6 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm text-gray-600">
                    © 2024 Pro Vision Academy. All Rights Reserved.
                </div>
                <div class="flex space-x-4 mt-2 md:mt-0">
                    <a href="#" class="text-sm text-gray-600 hover:text-blue-600">Help</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-blue-600">Support</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-blue-600">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Flash Messages -->
    @if(session('success'))
        <div id="successMessage" class="fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif
    
    @if(session('error'))
        <div id="errorMessage" class="fixed top-20 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif
    
    @if(session('warning'))
        <div id="warningMessage" class="fixed top-20 right-4 bg-yellow-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                {{ session('warning') }}
            </div>
        </div>
    @endif
    
    <!-- Scripts -->
    <script>
        // Auto-hide flash messages
        document.addEventListener('DOMContentLoaded', function() {
            const messages = ['successMessage', 'errorMessage', 'warningMessage'];
            
            messages.forEach(function(messageId) {
                const element = document.getElementById(messageId);
                if (element) {
                    setTimeout(function() {
                        element.style.opacity = '0';
                        setTimeout(function() {
                            element.remove();
                        }, 300);
                    }, 5000);
                }
            });
        });
        
        // Confirm dialogs for delete actions
        function confirmDelete(message = 'Are you sure you want to delete this item?') {
            return confirm(message);
        }
        
        // Loading state for forms
        function showLoading(button) {
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Loading...';
            button.disabled = true;
            
            return function() {
                button.innerHTML = originalText;
                button.disabled = false;
            };
        }
    </script>
</body>
</html>