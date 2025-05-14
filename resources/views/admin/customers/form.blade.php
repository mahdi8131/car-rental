<div class="space-y-4">
    <div>
        <label class="block font-medium">Name</label>
        <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $user->name ?? '') }}" required>
    </div>
    <div>
        <label class="block font-medium">Email</label>
        <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email', $user->email ?? '') }}" required>
    </div>
    <div>
        <label class="block font-medium">Phone</label>
        <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone', $user->phone ?? '') }}" required>
    </div>
    <div>
        <label class="block font-medium">Address</label>
        <textarea name="address" class="w-full border rounded px-3 py-2" required>{{ old('address', $user->address ?? '') }}</textarea>
    </div>
    <!-- password -->
    <div>
        <label class="block font-medium">Password</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2" {{ isset($user) ? '' : 'required' }}>
    </div>
    <div>
        <label class="block font-medium">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" {{ isset($user) ? '' : 'required' }}>
    </div>
    <!-- image -->
    <div class="flex items-center space-x-4">
        <label class="block font-medium">Profile Image</label>
        <input type="file" name="image" class="border rounded px-3 py-2">
        @if(isset($user) && $user->image)
            <img src="{{ asset('image/' . $user->image) }}" alt="Profile Image" class="w-16 h-16 rounded-full">
        @endif
    </div>
</div>
