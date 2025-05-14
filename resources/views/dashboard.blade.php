<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}</h1>
                <p class="text-gray-600">Manage your car rentals and profile</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('frontend.cars.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-300 inline-block">
                    Rent a New Car
                </a>
            </div>
        </div>

        <!-- Stats Cards -->



        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

            <!-- Pending Rentals Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-gray-100 text-gray-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500">Pending Rentals</p>
                        <p class="text-2xl font-bold">{{ $pendingRentals }}</p>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500">Ongoing Rentals</p>
                        <p class="text-2xl font-bold">{{ $ongoingRentals }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500">Completed Rentals</p>
                        <p class="text-2xl font-bold">{{ $completedRentals }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500">Upcoming Rentals</p>
                        <p class="text-2xl font-bold">{{ $upcomingRentals }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Rentals Section -->
        <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Your Current Rentals</h2>
            </div>
            <div class="divide-y divide-gray-200">
                @forelse($currentRentals as $rental)
                <div class="p-6 hover:bg-gray-50 transition duration-150">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <div class="md:w-1/4 mb-4 md:mb-0">
                            <img src="{{ asset('uploads/' . $rental->car->image) }}" alt="{{ $rental->car->name }}"
                                class="w-full h-40 object-cover rounded-lg">
                        </div>
                        <div class="md:w-2/4 md:px-6">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $rental->car->name }}</h3>
                            <p class="text-gray-600">{{ $rental->car->brand }} • {{ $rental->car->model }} •
                                {{ $rental->car->year }}
                            </p>
                            <div class="flex items-center mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-600">
                                    {{ $rental->start_date->format('M d, Y') }} -
                                    {{ $rental->end_date->format('M d, Y') }}
                                </span>
                            </div>
                            <div class="flex items-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-semibold text-gray-700">
                                    Total: ${{ number_format($rental->total_cost, 2) }}
                                </span>
                            </div>
                        </div>
                        <div class="md:w-1/4 mt-4 md:mt-0 flex justify-end">
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                @if($rental->status === 'pending') bg-gray-100 text-gray-800
                                @elseif($rental->status === 'ongoing') bg-blue-100 text-blue-800
                                @elseif($rental->status === 'upcoming') bg-yellow-100 text-yellow-800
                                @elseif($rental->status === 'completed') bg-green-100 text-green-800
                                @elseif($rental->status === 'cancelled') bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst($rental->status) }}
                            </span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-6 text-center text-gray-500">
                    You don't have any current rentals. <a href="{{ route('frontend.cars.index') }}"
                        class="text-blue-600 hover:underline">Rent a car now!</a>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Rental History Section -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Rental History</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Car</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rental Period</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Cost</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($rentalHistory as $rental)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ asset('uploads/' . $rental->car->image) }}"
                                            alt="{{ $rental->car->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $rental->car->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $rental->car->brand }}
                                            {{ $rental->car->model }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $rental->start_date->format('M d, Y') }}</div>
                                <div class="text-sm text-gray-500">to {{ $rental->end_date->format('M d, Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                ${{ number_format($rental->total_cost, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if($rental->status === 'completed') bg-green-100 text-green-800
                                    @elseif($rental->status === 'canceled') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('rentals.show', $rental) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                @if($rental->status === 'upcoming')
                                <form action="{{ route('frontend.rentals.cancel', $rental) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Cancel</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                No rental history found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($rentalHistory->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $rentalHistory->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>