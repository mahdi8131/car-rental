<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Add New Rental</h1>

        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Customer</label>
                <select name="user_id" class="w-full border rounded px-3 py-2">
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Car</label>
                <select name="car_id" id="car_id" class="w-full border rounded px-3 py-2">
                    <option value="" disabled selected>-- Select a Car --</option>
                    @foreach($cars as $car)
                    <option value="{{ $car->id }}" data-price="{{ $car->daily_rent_price }}">
                        {{ $car->name }} ({{ $car->brand }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="pending">Pending</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full border rounded px-3 py-2"
                    min="{{ date('Y-m-d') }}">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">End Date</label>
                <input type="date" name="end_date" id="end_date" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Total Cost</label>
                <input type="number" name="total_cost" id="total_cost" class="w-full border rounded px-3 py-2" readonly>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </form>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const carSelect = document.getElementById('car_id');
        const totalCostInput = document.getElementById('total_cost');

        let dailyRent = 0;

        carSelect.addEventListener('change', function() {
            dailyRent = parseFloat(this.options[this.selectedIndex].dataset.price || 0);
            calculateTotal();
        });

        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
            calculateTotal();
        });

        endDateInput.addEventListener('change', function() {
            calculateTotal();
        });

        function calculateTotal() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (!isNaN(startDate) && !isNaN(endDate) && dailyRent > 0 && endDate >= startDate) {
                const diffDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1; // +1 to include start day
                const total = diffDays * dailyRent;
                totalCostInput.value = total;
            } else {
                totalCostInput.value = '';
            }
        }
    });
</script>