<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


/**
 * @property string $id
 * @property string name
 * @property string url
 */
class Calendar extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
      "name",
      "url",
    ];
}
