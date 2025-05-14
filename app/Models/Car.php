<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'car_type',
        'daily_rent_price',
        'availability',
        'image', 
    ];

    // Scope to get only available cars
    public function scopeAvailable($query)
    {
        return $query->where('availability', 'available');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function scopeFilter($query)
    {
        return $query->when(request('brand'), function($q) {
                $q->where('brand', request('brand'));
            })
            ->when(request('car_type'), function($q) {
                $q->where('car_type', request('car_type'));
            })
            ->when(request('min_price'), function($q) {
                $q->where('daily_rent_price', '>=', request('min_price'));
            })
            ->when(request('max_price'), function($q) {
                $q->where('daily_rent_price', '<=', request('max_price'));
            });
    }
}
