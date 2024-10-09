<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\VaccineCandidate;

class VaccineCenter extends Model
{
    use HasFactory;

    protected $table = "vaccine_centers";

    protected $fillable = ["name", "limit", "address"];

    public function vaccineCandidate(): HasMany
    {
        return $this->hasMany(VaccineCandidate::class);
    }
}
