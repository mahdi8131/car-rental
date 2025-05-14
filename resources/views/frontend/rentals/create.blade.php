<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Rent {{ $car->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Car Info Card - Now on the left side -->
            <div class="bg-white rounded-lg shadow overflow-hidden order-1 md:order-1">
                <img src="{{ asset('uploads/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">{{ $car->name }}</h2>
                    <div class="space-y-2">
                        <p class="text-gray-700"><strong>Brand:</strong> {{ $car->brand }}</p>
                        <p class="text-gray-700"><strong>Model:</strong> {{ $car->model }}</p>
                        <p class="text-gray-700"><strong>Type:</strong> {{ $car->car_type }}</p>
                        <p class="text-gray-700"><strong>Year:</strong> {{ $car->year }}</p>
                        <p class="text-gray-700"><strong>Daily Price:</strong> ${{ number_format($car->daily_rent_price, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Rental Form - Now on the right side -->
            <div class="order-2 md:order-2">
                <form action="{{ route('frontend.rentals.store', $car) }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-6">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="date" id="start_date" name="start_date" required 
                            min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <input type="date" id="end_date" name="end_date" required
                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border">
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-gray-50 p-4 rounded-md">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Estimated Total Cost</label>
                        <p id="total_cost" class="text-lg font-semibold text-gray-900">$0.00</p>
                        <p id="rental_days" class="text-sm text-gray-500">0 days</p>
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium">
                        Confirm Rental
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dailyPrice = {{ $car->daily_rent_price }};
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const totalCostElement = document.getElementById('total_cost');
        const rentalDaysElement = document.getElementById('rental_days');

        // Set minimum end date based on start date
        startDateInput.addEventListener('change', function() {
            const startDate = new Date(this.value);
            const minEndDate = new Date(startDate);
            minEndDate.setDate(minEndDate.getDate() + 1);
            
            endDateInput.min = minEndDate.toISOString().split('T')[0];
            
            // If end date is before new min date, reset it
            if (endDateInput.value && new Date(endDateInput.value) < minEndDate) {
                endDateInput.value = '';
            }
            
            calculateTotal();
        });

        endDateInput.addEventListener('change', calculateTotal);

        function calculateTotal() {
            if (startDateInput.value && endDateInput.value) {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                
                // Calculate difference in days
                const timeDiff = endDate - startDate;
                const days = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                
                if (days > 0) {
                    const total = days * dailyPrice;
                    totalCostElement.textContent = '$' + total.toFixed(2);
                    rentalDaysElement.textContent = days + ' day' + (days !== 1 ? 's' : '');
                } else {
                    totalCostElement.textContent = '$0.00';
                    rentalDaysElement.textContent = '0 days';
                }
            } else {
                totalCostElement.textContent = '$0.00';
                rentalDaysElement.textContent = '0 days';
            }
        }

        // Initialize calculation
        calculateTotal();
    });
</script>