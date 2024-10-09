<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\VaccineCenter;

class VaccineCandidate extends Model
{
    use HasFactory;

    protected $table = "vaccine_candidates";

    protected $fillable = ["center_id", "name", "email", "phone", "nid"];

    public function vaccineCenter(): BelongsTo
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
