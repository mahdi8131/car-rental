<x-app-layout>
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Manage Customers</h1>

            <!-- Filter + Search Form -->
            <form id="filterForm" method="GET" action="{{ route('customers.index') }}" class="flex gap-2 items-center">
                <select name="role" onchange="submitFilter()" class="border rounded px-2 py-1">
                    <option value="">-- Filter by Role --</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="customer" {{ request('role') === 'customer' ? 'selected' : '' }}>Customer</option>
                </select>

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                    class="border rounded px-2 py-1" oninput="submitFilter()" />
            </form>

            <a href="{{ route('customers.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Add Customer</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 font-semibold">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Photo</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Phone</th>
                        <th class="p-3">Address</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $loop->iteration + ($customers->currentPage() - 1) * $customers->perPage() }}</td>
                            <td class="p-3">
                                <img src="{{ $customer->image ? asset('image/' . $customer->image) : asset('default.png') }}" alt="Photo"
                                    class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="p-3">{{ $customer->name }}</td>
                            <td class="p-3">{{ $customer->email }}</td>
                            <td class="p-3">{{ $customer->phone }}</td>
                            <td class="p-3">{{ $customer->address }}</td>
                            <td class="p-3 flex gap-2">
                                <a href="{{ route('customers.show', $customer) }}"
                                    class="text-green-600 hover:underline">View</a>
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('customers.edit', $customer) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('customers.destroy', $customer) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">No customers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $customers->appends(request()->query())->links() }}
        </div>
    </div>
    <script>
        let debounceTimer;
        function submitFilter() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 300); // Delay in ms for typing debounce
        }
    </script>
</x-app-layout>