<footer class="bg-gray-900 text-gray-300 pt-10 pb-4 mt-10 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About -->
            <div>
                <h2 class="text-xl font-semibold text-white mb-4">Car Rental</h2>
                <p class="text-sm">
                    Experience safe and reliable car rental services. We offer high-quality vehicles and excellent customer satisfaction.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h2 class="text-xl font-semibold text-white mb-4">Quick Links</h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                    <li><a href="{{ route('frontend.cars.index') }}" class="hover:text-white">Browse Cars</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h2 class="text-xl font-semibold text-white mb-4">Contact Info</h2>
                <ul class="space-y-2 text-sm">
                    <li><strong>Address:</strong> Dhaka, Bangladesh</li>
                    <li><strong>Email:</strong> info@carrental.com</li>
                    <li><strong>Phone:</strong> +880 1234 567890</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Car Rental. All rights reserved.
        </div>
    </div>

    <!-- Back to Top Button -->
    <button 
        id="backToTopBtn"
        onclick="scrollToTop()" 
        class="hidden fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition-opacity duration-300 z-50"
        title="Back to Top"
    >
        ↑
    </button>
</footer>

<!-- Scroll Script -->
<script>
    const backToTopBtn = document.getElementById('backToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) {
            backToTopBtn.classList.remove('hidden');
            backToTopBtn.classList.add('opacity-100');
        } else {
            backToTopBtn.classList.add('hidden');
            backToTopBtn.classList.remove('opacity-100');
        }
    });

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
