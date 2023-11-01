<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $time
 * @method static truncate()
 */
class MovieTime extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "time"
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
