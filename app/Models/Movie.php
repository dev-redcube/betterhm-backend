<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\LazyCollection;

/**
 * @method static truncate()
 * @method static LazyCollection lazy()
 * @property string $title
 * @property DateTime $date
 * @property string $fsk
 * @property string $genre
 * @property int $runtime
 * @property string $info
 * @property string $content
 * @property string $trailerUrl
 * @property string $coverUrl
 *
 */
class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "date",
        "fsk",
        "genre",
        "runtime",
        "info",
        "content",
        "coverUrl",
        "trailerUrl",
    ];

    protected $casts = [
        "date" => "datetime",
    ];
}
