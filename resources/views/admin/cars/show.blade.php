<x-app-layout>
    <div class="max-w-5xl mx-auto bg-white rounded p-10 mt-12 shadow">
        <h1 class="text-3xl font-semibold mb-8 text-blue-700">Car Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Car Image -->
            <div>
                @if($car->image && file_exists(public_path('uploads/' . $car->image)))
                    <img src="{{ asset('uploads/' . $car->image) }}" alt="Car Image"
                         class="w-full h-80 object-cover rounded-lg shadow">
                @else
                    <div class="h-80 flex items-center justify-center bg-gray-100 rounded-lg text-gray-500">
                        No Image Available
                    </div>
                @endif
            </div>

            <!-- Car Details and Rent Form -->
            <div class="space-y-4">
                <div class="text-gray-800 space-y-2">
                    <p><strong>Name:</strong> {{ $car->name }}</p>
                    <p><strong>Brand:</strong> {{ $car->brand }}</p>
                    <p><strong>Model:</strong> {{ $car->model }}</p>
                    <p><strong>Year:</strong> {{ $car->year }}</p>
                    <p><strong>Type:</strong> {{ $car->car_type }}</p>
                    <p><strong>Rent Price:</strong> ${{ $car->daily_rent_price }} / day</p>
                    <p>
                        <strong>Status:</strong>
                        <span class="inline-block px-2 py-1 text-sm rounded 
                            {{ $car->availability ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ $car->availability ? 'Available' : 'Not Available' }}
                        </span>
                    </p>
                </div>

                @if($car->availability)
                <!-- Rent Form -->
                <form action="" method="POST" class="mt-6 space-y-4">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <div>
                        <label for="start_date" class="block font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" name="start_date" required
                               class="w-full border rounded px-3 py-2 mt-1 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label for="end_date" class="block font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" required
                               class="w-full border rounded px-3 py-2 mt-1 focus:ring focus:ring-blue-200">
                    </div>

                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Rent Now
                    </button>
                </form>
                @else
                    <p class="text-red-500 font-medium mt-4">This car is currently not available for rent.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
