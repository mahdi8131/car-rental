<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 bg-white rounded shadow mt-12">
        <div class="flex justify-between items-center mb-4 p-4 border-b ">
            <h1 class="text-2xl font-bold">Manage Cars</h1>
            <form id="filterForm" method="GET" action="{{ route('cars.index') }}" class="flex gap-2 items-center">
        <!-- Availability Filter -->
        <select name="availability" onchange="submitFilter()" class="border rounded px-2 py-1">
            <option value="">-- Filter by Status --</option>
            <option value="1" {{ request('availability') === '1' ? 'selected' : '' }}>Available</option>
            <option value="0" {{ request('availability') === '0' ? 'selected' : '' }}>Not Available</option>
        </select>

        <!-- Search Field -->
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or brand..."
            class="border rounded px-2 py-1" oninput="submitFilter()" />
    </form>
            <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+
                Add Car
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2  rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow ">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 font-semibold">
                    <tr>
                        <th class="p-3">Image</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Brand</th>
                        <th class="p-3">Model</th>
                        <th class="p-3">Year</th>
                        <th class="p-3">Type</th>
                        <th class="p-3">Rent</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">
                                @if($car->image && file_exists(public_path('uploads/' . $car->image)))
                                    <img src="{{ asset('uploads/' . $car->image) }}" class="w-16 h-12 object-cover rounded"
                                        alt="Car Image">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="p-3">{{ $car->name }}</td>
                            <td class="p-3">{{ $car->brand }}</td>
                            <td class="p-3">{{ $car->model }}</td>
                            <td class="p-3">{{ $car->year }}</td>
                            <td class="p-3">{{ $car->car_type }}</td>
                            <td class="p-3">${{ $car->daily_rent_price }}</td>
                            <td class="p-3">
                                <span
                                    class="px-2 py-1 rounded text-white text-xs {{ $car->availability ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $car->availability ? 'Available' : 'Not Available' }}
                                </span>
                            </td>
                            <td class="p-3 flex gap-2 items-center">
                                <a href="{{ route('cars.show', $car) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">View</a>
                                <a href="{{ route('cars.edit', $car) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $cars->links() }}
        </div>
    </div>
</x-app-layout>

<script>
    let debounceTimer;

    function submitFilter() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            document.getElementById('filterForm').submit();
        }, 300);
    }
</script>