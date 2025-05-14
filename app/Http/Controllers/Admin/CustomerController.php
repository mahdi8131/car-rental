<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $customers = $query->paginate(10);

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required|string',
            'address'  => 'required|string',
            'image'    => 'nullable|image',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data             = $request->all();
        $data['password'] = Hash::make($request->password); 

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $filename);
            $data['image'] = $filename;
        }

        User::create($data); 
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = User::findOrFail($id);
        $rentals  = Rental::where('user_id', $id)->latest()->get();

        return view('admin.customers.show', compact('customer', 'rentals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = User::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id); // Admin updating another user

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $id,
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('image/' . $user->image))) {
                try {
                    unlink(public_path('image/' . $user->image));
                } catch (Exception $e) {
                    Log::error("Failed to delete old profile image: " . $user->image . " Error: " . $e->getMessage());
                }
            }

            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        if ($user->email !== $validated['email']) {
            $validated['email_verified_at'] = null;
        }

        $user->update($validated);

        return Redirect::route('customers.index')->with('status', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = User::findOrFail($id);

        if ($customer->image && file_exists(public_path('image/' . $customer->image))) {
            try {
                unlink(public_path('image/' . $customer->image));
            } catch (Exception $e) {
                Log::error("Failed to delete car image: " . $customer->image . " Error: " . $e->getMessage());
            }
        }

        $customer->delete();

        return back()->with('success', 'Customer deleted successfully.');
    }
}
