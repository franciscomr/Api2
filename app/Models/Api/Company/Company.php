<?php

namespace App\Models\Api\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'state',
        'postal_code'
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
