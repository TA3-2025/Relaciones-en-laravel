<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Fruta extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function animales(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class, "come");
    }
}
