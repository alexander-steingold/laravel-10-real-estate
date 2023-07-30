<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    public static array $type = ['house', 'apartment', 'land', 'commercial', 'garage', 'lot'];
    public static array $target = ['sale', 'rent'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function firstImage(): HasOne
    {
        return $this->hasOne(Image::class)->orderBy('id', 'asc');
    }

    public function scopeActive(Builder|QueryBuilder $query)
    {
        $query->where('status', '=', '1');
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('city', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('contact_name', 'like', '%' . $search . '%');
//                    ->orWhereHas('employer', function ($query) use ($search) {
//                        $query->where('company_name', 'like', '%' . $search . '%');
//                    });
            });

        })->when($filters['bedrooms'] ?? null, function ($query, $bedrooms) {
            $query->where('bedrooms', '=', $bedrooms);
        })->when($filters['bathrooms'] ?? null, function ($query, $bathrooms) {
            $query->where('bathrooms', '=', $bathrooms);
        })->when($filters['type'] ?? null, function ($query, $type) {
            $query->where('type', '=', $type);
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('target', '=', $status);
        })->when($filters['building'] ?? null, function ($query, $building) {
            $currentYear = Carbon::now()->year;
            $lowerBound = $currentYear - $building;
            $query->where('year_built', '>=', $lowerBound);
            $query->where('year_built', '<=', $currentYear);
        })->when($filters['area'] ?? null, function ($query, $area) {
            $query->where('area', '>=', $area);
        })->when($filters['price'] ?? null, function ($query, $price) {
            $query->where('price', '<=', $price);
        });
    }
}
