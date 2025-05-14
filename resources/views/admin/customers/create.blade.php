<x-app-layout>
    <div class="max-w-3xl mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Add New Customer</h1>

        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.customers.form', ['customer' => ""])

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>