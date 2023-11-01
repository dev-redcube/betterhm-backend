<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $time
 */
class MovieTimeResource extends JsonResource
{
    public function toArray(Request $request): string
    {
        return $this->time;
    }
}
