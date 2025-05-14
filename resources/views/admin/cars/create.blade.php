<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-12">
        <h2 class="text-xl font-semibold mb-4">Add New Car</h2>

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.cars.form', ['car' => new \App\Models\Car])
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-10 py-2 rounded mt-4">Save</button>
        </form>
    </div>
</x-app-layout>
