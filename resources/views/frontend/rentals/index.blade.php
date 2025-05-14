<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">My Rentals</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Car</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Start Date</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">End Date</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Total Cost</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Status</th>
                        <th class="text-left px-4 py-3 text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rentals as $rental)
                    <tr class="border-t">
                        <td class="px-4 py-3 text-sm text-gray-800">
                            {{ $rental->car->name }} ({{ $rental->car->brand }})
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800">
                            {{ $rental->start_date->format('Y-m-d') }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800">
                            {{ $rental->end_date->format('Y-m-d') }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800">
                            ${{ number_format($rental->total_cost, 2) }}
                        </td>
                        <!-- <td class="px-4 py-3 text-sm">
                            @if(now() > $rental->end_date)
                                <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Completed</span>
                            @elseif(now() >= $rental->start_date)
                                <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">Ongoing</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">Upcoming</span>
                            @endif
                        </td> -->
                        <td class="px-4 py-3 text-sm">
                            @switch($rental->status)
                            @case('Processing')
                            <span class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">Pending</span>
                            @break
                            @case('Ongoing')
                            <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">Ongoing</span>
                            @break
                            @case('Completed')
                            <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Completed</span>
                            @break
                            @case('Canceled')
                            <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">Canceled</span>
                            @break
                            @default
                            <span class="inline-block px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">{{ $rental->status }}</span>
                            @endswitch
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if($rental->status === 'Processing')
                            <form action="{{ route('frontend.rentals.cancel', $rental) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 text-xs text-white bg-red-600 rounded hover:bg-red-700">
                                    Cancel
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">You have no rentals yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>