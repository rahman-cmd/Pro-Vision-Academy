</div> <!-- Main content end -->
    </div> <!-- Flex container end -->

    <footer class="bg-[#19506b] text-white py-4 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Pro Vision Academy. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Additional Scripts -->
    <script>
        // Common admin panel functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Flash message auto-hide
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(message => {
                setTimeout(() => {
                    message.classList.add('opacity-0');
                    setTimeout(() => {
                        message.remove();
                    }, 500);
                }, 5000);
            });
        });
    </script>
</body>
</html>