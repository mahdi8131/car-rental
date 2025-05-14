<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Rental::with(['user', 'car']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                })->orWhereHas('car', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('brand', 'like', "%$search%");
                });
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $rentals = $query->latest()->paginate(10);

        // Define the status options for the filter dropdown
        $statuses = ['Pending', 'Ongoing', 'Completed', 'Canceled'];

        return view('admin.rentals.index', compact('rentals', 'statuses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::where('role', 'customer')->get();
        $cars      = Car::where('availability', true)->get();
        return view('admin.rentals.create', compact('customers', 'cars'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'car_id'     => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
            'status' => 'required|in:pending,ongoing,completed,canceled',

        ]);

        $car       = Car::findOrFail($request->car_id);
        $start     = Carbon::parse($request->start_date);
        $end       = Carbon::parse($request->end_date);
        $days      = $start->diffInDays($end) + 1;
        $totalCost = $car->daily_rent_price * $days;

        $rental = Rental::create([
            'user_id'    => $request->user_id,
            'car_id'     => $car->id,
            'start_date' => $start->toDateString(),
            'end_date'   => $end->toDateString(),
            'total_cost' => $totalCost,
            'status'     => $this->getRentalStatus($start, $end),
        ]);

        $this->updateCarAvailability($car, $start, $end);

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    public function getRentalStatus($startDate, $endDate){

        if (Carbon::now()->gt($endDate)) {
            return 'Completed';
        }

        return 'Ongoing';
    }

    public function updateCarAvailability(Car $car, $startDate, $endDate)
    {
        if (Carbon::now()->between($startDate, $endDate)) {
            $car->availability = false;
        } elseif (Carbon::now()->gt($endDate)) {
            $car->availability = true; 
        } else {
            $car->availability = true; 
        }

        $car->save();
    }

    public function show(string $id)
    {
        $rental = Rental::with(['user', 'car'])->findOrFail($id);
        return view('admin.rentals.show', compact('rental'));
    }

    public function edit(string $id)
    {
        $rental = Rental::findOrFail($id);
        return view('admin.rentals.edit', compact('rental'));
    }


    public function update(Request $request, string $id)
{
    $request->validate([
        'status' => 'required|in:pending,ongoing,completed,canceled',
    ]);

    $rental = Rental::findOrFail($id);
    $car    = $rental->car;

    $rental->update([
        'status' => $request->status,
    ]);

    if ($request->status === 'ongoing') {
        $car->availability = false; 
    } elseif (in_array($request->status, ['completed', 'pending', 'canceled'])) {
        $car->availability = true; 
    }

    $car->save();

    return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
}


    public function destroy(string $id)
    {
        $rental = Rental::findOrFail($id);
        $car    = $rental->car;

        // যদি rental চলমান ছিল, তাহলে গাড়িকে আবার available করা হবে
        if ($rental->status === 'Ongoing') {
            $car->availability = true;
            $car->save();
        }

        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }

}
