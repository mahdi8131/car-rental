<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Car Image -->
            <div>
                <img src="{{ asset('uploads/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-auto rounded-lg shadow">
            </div>

            <!-- Car Details -->
            <div class="space-y-4">
                <h1 class="text-3xl font-bold">{{ $car->name }}</h1>
                <p><span class="font-semibold">Brand:</span> {{ $car->brand }}</p>
                <p><span class="font-semibold">Model:</span> {{ $car->model }}</p>
                <p><span class="font-semibold">Year:</span> {{ $car->year }}</p>
                <p><span class="font-semibold">Type:</span> {{ $car->car_type }}</p>
                <p><span class="font-semibold">Daily Price:</span> ${{ number_format($car->daily_rent_price, 2) }}</p>

                @auth
                <a href="{{ route('frontend.rentals.create', $car) }}"
                    class="inline-block px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Rent This Car
                </a>
                @else
                <p class="text-gray-600">
                    Please <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> to rent this car.
                </p>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>