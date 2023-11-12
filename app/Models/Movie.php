<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\LazyCollection;

/**
 * @method static truncate()
 * @method static LazyCollection lazy()
 * @property string $title
 * @property DateTime $date
 * @property string $fsk
 * @property string $genre
 * @property int $length
 * @property string $info
 * @property string $content
 * @property string $coverUrl
 * @property string $coverBlurhash
 * @property string $trailerUrl
 * @property string $unifilmUrl
 *
 */
class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "title",
        "date",
        "fsk",
        "genre",
        "length",
        "info",
        "content",
        "coverUrl",
        "coverBlurhash",
        "trailerUrl",
        "unifilmUrl",
    ];

    protected $casts = [
        "date" => "datetime",
    ];

    public function times(): HasMany
    {
        return $this->hasMany(MovieTime::class);
    }
}
