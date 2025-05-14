<x-app-layout>
    <div class="max-w-5xl mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Customer Details</h1>

        <div class="mb-6">
            <!-- image -->
            <img src="{{ $customer->image ? asset('image/' . $customer->image) : asset('default.png') }}" alt="Customer Photo"
                class="w-50 h-60 rounded object-cover mb-4">
            <p><strong>Name:</strong> {{ $customer->name }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p><strong>Address:</strong> {{ $customer->address }}</p>
        </div>

        <h2 class="text-lg font-semibold mb-2">Rental History</h2>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 font-semibold">
                    <tr>
                        <th class="p-3">Car</th>
                        <th class="p-3">Start Date</th>
                        <th class="p-3">End Date</th>
                        <th class="p-3">Total</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer->rentals as $rental)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $rental->car->name ?? 'N/A' }}</td>
                            <td class="p-3">{{ $rental->start_date }}</td>
                            <td class="p-3">{{ $rental->end_date }}</td>
                            <td class="p-3">৳{{ $rental->total_cost }}</td>
                            <td class="p-3">{{ $rental->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
