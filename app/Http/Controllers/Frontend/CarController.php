<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $carId = $request->car_id;
        $brand = $request->brand;
        $price = $request->price;

        $cars   = Car::all();
        $brands = Car::distinct()->pluck('brand');

        $filteredCars = Car::query()
            ->where('availability', true)
            ->when($carId, fn($q) => $q->where('id', $carId))
            ->when($brand, fn($q) => $q->where('brand', $brand))
            ->when($price, fn($q) => $q->where('daily_rent_price', '<=', $price))
            ->latest()
            ->paginate(9)
            ->appends($request->query());

        return view('frontend.cars.index', [
            'cars'    => $filteredCars,
            'allCars' => $cars,
            'brands'  => $brands,
        ]);
    }

    public function show(Car $car)
    {
        if (! $car->availability) {
            return redirect()->route('frontend.cars.index')->with('error', 'This car is not available');
        }

        return view('frontend.cars.show', compact('car'));
    }
}
