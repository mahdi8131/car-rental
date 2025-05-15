<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmationMail;
use App\Mail\RentalAdminNotificationMail;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = auth()->user()->rentals()->with('car')->latest()->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function create(Car $car)
    {
        if (! $car->availability) {
            return redirect()->route('frontend.cars.index')->with('error', 'This car is not available');
        }

        return view('frontend.rentals.create', compact('car'));
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'car_id'     => 'required|exists:cars,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date'   => 'required|date|after:start_date',
    ]);

    $car = Car::findOrFail($validated['car_id']);

    if (! $car->availability) {
        return back()->with('error', 'This car is currently marked as unavailable.');
    }

    $isAvailable = ! $car->rentals()
        ->where(function ($query) use ($validated) {
            $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                ->orWhere(function ($query) use ($validated) {
                    $query->where('start_date', '<=', $validated['start_date'])
                        ->where('end_date', '>=', $validated['end_date']);
                });
        })
        ->exists();

    if (! $isAvailable) {
        return back()->with('error', 'This car is not available for the selected dates.');
    }

    $days = (new DateTime($validated['start_date']))
        ->diff(new DateTime($validated['end_date']))
        ->days;

    $days = max($days, 1);
    $totalCost = $days * $car->daily_rent_price;

    $rental = $car->rentals()->create([
        'user_id'    => auth()->id(),
        'start_date' => $validated['start_date'],
        'end_date'   => $validated['end_date'],
        'total_cost' => $totalCost,
        'status'     => 'pending',
    ]);

    Mail::to($rental->user->email)->send(new RentalConfirmationMail($rental));

    Mail::to('ma.mahadi228@gmail.com')->send(new RentalAdminNotificationMail($rental));

    return redirect()->route('frontend.rentals.index')->with('success', 'Rental request submitted. Awaiting admin approval.');
}


    public function cancel(Rental $rental)
    {
        if ($rental->user_id !== auth()->id()) {
            abort(403);
        }

        if (now() >= $rental->start_date) {
            return back()->with('error', 'Cannot cancel a rental that has already started');
        }

        $rental->delete();

        return back()->with('success', 'Rental cancelled successfully');
    }
}
