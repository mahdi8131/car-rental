<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Rental Details</h1>

        <p><strong>Rental ID:</strong> {{ $rental->id }}</p>
        <p><strong>Customer:{{ $rental->user ? $rental->user->name : 'N/A' }}</p>
        <p><strong>Car:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})</p>
        <p><strong>Start Date:</strong> {{ $rental->start_date }}</p>
        <p><strong>End Date:</strong> {{ $rental->end_date }}</p>
        <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>
        <p><strong>Status:</strong> {{ $rental->status }}</p>

        <a href="{{ route('rentals.edit', $rental) }}" class="text-blue-600 hover:underline mt-4 inline-block">Edit Rental</a>
    </div>
</x-app-layout>
