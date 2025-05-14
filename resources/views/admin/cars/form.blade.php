<div class="space-y-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Car Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
        <input type="text" name="brand" id="brand" value="{{ old('brand', $car->brand) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
        @error('brand') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
        <input type="text" name="model" id="model" value="{{ old('model', $car->model) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
        @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
        <input type="number" name="year" id="year" value="{{ old('year', $car->year) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
        @error('year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="car_type" class="block text-sm font-medium text-gray-700">Car Type</label>
        <select id="type" name="car_type" required 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="sedan" {{ old('type', $car->type) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                <option value="suv" {{ old('type', $car->type) == 'suv' ? 'selected' : '' }}>SUV</option>
                <option value="hatchback" {{ old('type', $car->type) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                <option value="coupe" {{ old('type', $car->type) == 'coupe' ? 'selected' : '' }}>Coupe</option>
                <option value="convertible" {{ old('type', $car->type) == 'convertible' ? 'selected' : '' }}>Convertible</option>
            </select>
            @error('car_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="daily_rent_price" class="block text-sm font-medium text-gray-700">Daily Rent Price</label>
        <input type="number" name="daily_rent_price" id="daily_rent_price"
            value="{{ old('daily_rent_price', $car->daily_rent_price) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
        @error('daily_rent_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="availability" class="block text-sm font-medium text-gray-700">Availability</label>
        <select name="availability" id="availability"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required>
            <option value="1" {{ old('availability', $car->availability) == 1 ? 'selected' : '' }}>Available</option>
            <option value="0" {{ old('availability', $car->availability) == 0 ? 'selected' : '' }}>Not Available</option>
        </select>
        @error('availability') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Car Image</label>
        <input type="file" name="image" id="image"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
