<?php

namespace App\Http\Resources;

use App\Models\MovieTime;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $title
 * @property DateTime $date
 * @property string $fsk
 * @property string $genre
 * @property int $length
 * @property string $info
 * @property string $content
 * @property string $coverUrl
 * @property string $trailerUrl
 * @property string $unifilmUrl
 * @property mixed $times
 */
class MovieResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title" => $this->title,
            "date" => $this->date->format("Y-m-d"),
            "times" =>  MovieTimeResource::collection($this->times),
            "fsk" => $this->fsk,
            "genre" => $this->genre,
            "length" => $this->length,
            "info" => $this->info,
            "content" => $this->content,
            "coverUrl" => $this->coverUrl,
            "unifilmUrl" => $this->unifilmUrl,
        ];
    }
}
