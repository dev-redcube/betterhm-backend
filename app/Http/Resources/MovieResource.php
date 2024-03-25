<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $title
 * @property DateTime $date
 * @property string $time
 * @property string $fsk
 * @property string $genre
 * @property int $length
 * @property string $info
 * @property string $content
 * @property string $room
 * @property string $coverUrl
 * @property string $coverBlurhash
 * @property string $trailerUrl
 * @property string $unifilmUrl
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
            "time" =>  $this->time,
            "fsk" => $this->fsk,
            "genre" => $this->genre,
            "length" => $this->length,
            "info" => $this->info,
            "content" => $this->content,
            "room" => $this->room,
            "coverUrl" => $this->coverUrl,
            "coverBlurhash" => $this->coverBlurhash,
            "unifilmUrl" => $this->unifilmUrl,
        ];
    }
}
