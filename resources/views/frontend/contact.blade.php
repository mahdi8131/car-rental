<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-4xl font-extrabold text-blue-700 mb-4">Contact Us</h1>
        <p class="text-gray-600 mb-6">If you have any questions or need assistance, feel free to contact us using the form below or via our contact details.</p>

        <!-- Contact Details -->
        <div class="mb-10 bg-white p-6 rounded shadow">
            <ul class="text-gray-700 space-y-2">
                <li><strong>Email:</strong> support@carrental.com</li>
                <li><strong>Phone:</strong> +880 1234-567890</li>
                <li><strong>Address:</strong> 123 Main Street, Dhaka, Bangladesh</li>
            </ul>
        </div>

        <!-- Contact Form -->
        <div class="bg-white p-6 rounded shadow">
            
            <form action="" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Your Name</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="message" class="block text-gray-700 font-medium">Message</label>
                    <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>