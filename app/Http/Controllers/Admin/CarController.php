<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{

    public function index(Request $request)
{
    $query = Car::query();

    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%");
    }

    if ($request->has('availability') && $request->availability !== '') {
        $query->where('availability', $request->availability);
    }

    $cars = $query->latest()->paginate(10)->appends($request->query());

    return view('admin.cars.index', compact('cars'));
}

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'model'            => 'required|string|max:255',
            'year'             => 'required|integer',
            'car_type'         => 'required|string',
            'daily_rent_price' => 'required|numeric',
            'availability'     => 'required|boolean',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validated['image'] = $imageName;
        }

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.show', compact('car'));
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }
    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'name'             => 'required',
            'brand'            => 'required',
            'model'            => 'required',
            'year'             => 'required|integer',
            'car_type'         => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability'     => 'required|boolean',
            'image'            => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image && file_exists(public_path('uploads/' . $car->image))) {
                try {
                    unlink(public_path('uploads/' . $car->image));
                } catch (Exception $e) {
                    Log::error("Failed to delete old car image: " . $car->image . " Error: " . $e->getMessage());
                }
            }

            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        if ($car->image && file_exists(public_path('uploads/' . $car->image))) {
            try {
                unlink(public_path('uploads/' . $car->image));
            } catch (Exception $e) {
                Log::error("Failed to delete car image: " . $car->image . " Error: " . $e->getMessage());
            }
        }

        $car->delete();

        return back()->with('success', 'Car deleted successfully.');
    }

}
