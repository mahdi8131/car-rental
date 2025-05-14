<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-gray-800 mb-4">Browse Cars</h1>
            <p class="text-lg text-gray-600">Find the perfect car and book now!</p>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('frontend.cars.index') }}" id="filterForm"
            class="mb-10 grid grid-cols-1 md:grid-cols-4 gap-4">

            <!-- Car Dropdown -->
            <select name="car_id" onchange="this.form.submit()" class="border-gray-300 rounded-md">
                <option value="">All Cars</option>
                @foreach($allCars as $car)
                <option value="{{ $car->id }}" {{ request('car_id') == $car->id ? 'selected' : '' }}>
                    {{ $car->name }}
                </option>
                @endforeach
            </select>

            <!-- Brand Dropdown -->
            <select name="brand" onchange="this.form.submit()" class="border-gray-300 rounded-md">
                <option value="">All Brands</option>
                @foreach($brands as $brand)
                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                    {{ $brand }}
                </option>
                @endforeach
            </select>

            <!-- Price Input -->
            <input type="number" name="price" placeholder="Max Price"
                value="{{ request('price') }}"
                min="0"
                onchange="this.form.submit()"
                onkeydown="if(event.key==='Enter'){ this.form.submit(); }"
                class="border-gray-300 rounded-md">

            <!-- Reset -->
            <a href="{{ route('frontend.cars.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 text-center py-2 rounded transition">
                Reset
            </a>
        </form>

        <!-- Car Results -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($cars as $car)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-5 border">
                <img src="{{ asset('uploads/' . $car->image) }}"
                    alt="{{ $car->name }}"
                    class="w-full h-48 object-cover rounded mb-4">

                <h3 class="text-xl font-semibold text-gray-800">{{ $car->name }}</h3>
                <p class="text-gray-600">
                    {{ $car->brand }} |
                    <span class="text-green-600 font-bold">${{ $car->daily_rent_price }}/day</span>
                </p>

                <a href="{{ route('frontend.rentals.create', $car->id) }}"
                    class="mt-4 inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
                    Rent Now
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500">No cars match your criteria.</div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-10 text-center">
            {{ $cars->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>