<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-100 via-indigo-100 to-purple-100 py-16">
        <div class="container mx-auto px-4 flex flex-col-reverse md:flex-row items-center justify-between">
            
            <!-- Left Content -->
            <div class="w-full md:w-1/2 text-center md:text-left text-gray-800">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                    Rent Your Dream Car Today
                </h1>
                <p class="text-lg mb-6">
                    Explore our wide range of affordable and luxury cars for every journey.
                </p>
                <div class="flex justify-center md:justify-start space-x-4">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition">
                        Register
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="w-full md:w-1/2 mb-10 md:mb-0">
                <img src="{{ asset('hero.jpg') }}" alt="Car Rental" class="w-full h-auto rounded-lg shadow-lg">
            </div>
            
        </div>
    </section>

    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Featured Cars</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($cars as $car)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-5 border">
                <img src="{{ asset('uploads/' . $car->image) }}" class="w-full h-48 object-cover rounded mb-4" alt="{{ $car->name }}">
                <h3 class="text-xl font-semibold text-gray-800">{{ $car->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $car->brand }} | <span class="text-green-600 font-bold">${{ $car->daily_rent_price }}/day</span></p>
                <a href="{{ route('frontend.cars.show', $car) }}"
                    class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded transition">
                    View Details
                </a>
            </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-10 text-center">
            {{ $cars->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
