<?php

namespace App\Models\Api\Company;

use App\Traits\Api\InsertCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory, InsertCreatedByAndUpdatedBy;

    protected $fillable = [
        'company_id',
        'name',
        'address',
        'city',
        'state',
        'postal_code'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
