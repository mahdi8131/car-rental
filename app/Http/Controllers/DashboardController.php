<?php
namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function AdminDashboard()
    {
        $stats = [
            'totalCars'        => Car::count(),
            'availableCars'    => Car::where('availability', true)->count(),
            'totalRentals'     => Rental::count(),
            'totalEarnings'    => Rental::sum('total_cost'),
            'activeRentals'    => Rental::where('status', 'Ongoing')->count(),
            'completedRentals' => Rental::where('status', 'Completed')->count(),
            'totalBalance'     => $this->getCompletedRentalsBalance(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
    public function getCompletedRentalsBalance()
    {
        $completedRentals = Rental::where('status', 'Completed')->get();

        return $completedRentals->sum(function ($rental) {
            $startDate = \Carbon\Carbon::parse($rental->start_date);
            $endDate   = \Carbon\Carbon::parse($rental->end_date);
            $days      = $startDate->diffInDays($endDate) + 1;
            return $days * $rental->car->daily_rent_price;
        });
    }

    public function CustomerDashboard()
    {
        $user = Auth::user();

        $pendingRentals = $user->rentals()
            ->where('status', 'pending')
            ->count();

        $ongoingRentals = $user->rentals()
            ->where('status', 'ongoing')
            ->count();

        $completedRentals = $user->rentals()
            ->where('status', 'completed')
            ->count();

        $upcomingRentals = $user->rentals()
            ->where('status', 'upcoming')
            ->count();

        $currentRentals = $user->rentals()
            ->with('car')
            ->whereIn('status', ['panding', 'ongoing', 'upcoming'])
            ->orderBy('start_date')
            ->limit(3)
            ->get();

        $rentalHistory = $user->rentals()
            ->with('car')
            ->whereIn('status', ['completed', 'cancelled'])
            ->orderBy('end_date', 'desc')
            ->paginate(5);

        return view('dashboard', compact(
            'pendingRentals',
            'ongoingRentals',
            'completedRentals',
            'upcomingRentals',
            'currentRentals',
            'rentalHistory'
        ));
    }

}
