<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Rental</h1>

        <form action="{{ route('rentals.update', $rental) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="pending" {{ $rental->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="ongoing" {{ $rental->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ $rental->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="canceled" {{ $rental->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
</x-app-layout>
