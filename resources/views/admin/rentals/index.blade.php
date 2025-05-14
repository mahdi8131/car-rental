<x-app-layout>
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Manage Rentals</h1>


            <form id="filterForm" method="GET" action="{{ route('rentals.index') }}" class="flex gap-2 items-center">
                <select name="status" onchange="submitFilter()" class="border rounded px-2 py-1">
                    <option value="">-- Filter by Status --</option>
                    <option value="Ongoing" {{ request('status') === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ request('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Canceled" {{ request('status') === 'Canceled' ? 'selected' : '' }}>Canceled</option>
                </select>

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by Customer or Car..." class="border rounded px-2 py-1"
                    oninput="submitFilter()" />
            </form>

            <a href="{{ route('rentals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+
                Add Rental</a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 font-semibold">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Customer</th>
                        <th class="p-3">Car</th>
                        <th class="p-3">Start Date</th>
                        <th class="p-3">End Date</th>
                        <th class="p-3">Total Cost</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rentals as $rental)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $loop->iteration + ($rentals->currentPage() - 1) * $rentals->perPage() }}
                        </td>
                        <td class="p-3">{{ $rental->user ? $rental->user->name : 'N/A' }}</td>

                        <td class="p-3">
                            {{ $rental->car ? $rental->car->name . ' (' . $rental->car->brand . ')' : 'N/A' }}
                        </td>
                        <td class="p-3">{{ $rental->start_date }}</td>
                        <td class="p-3">{{ $rental->end_date }}</td>
                        <td class="p-3">${{ number_format($rental->total_cost, 2) }}</td>
                        <td class="p-3">
                            <span @class([ 'px-2 py-1 rounded text-sm font-medium' , 'bg-yellow-200 text-yellow-800'=> in_array($rental->status, ['pending', 'Ongoing']),
                                'bg-green-200 text-green-800' => $rental->status === 'Completed',
                                'bg-red-200 text-red-800' => $rental->status === 'Canceled',
                                ])>
                                {{ $rental->status }}
                            </span
                                </td>

                        <td class="p-3 flex gap-2">
                            <a href="{{ route('rentals.show', $rental) }}"
                                class="text-green-600 hover:underline">View</a>
                            <a href="{{ route('rentals.edit', $rental) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('rentals.destroy', $rental) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="p-3 text-center text-gray-500">No rentals found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $rentals->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        let debounceTimer;

        function submitFilter() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 300);
        }
    </script>
</x-app-layout>