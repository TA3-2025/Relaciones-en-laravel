<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Habitat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function animales(): HasMany
    {
        return $this->hasMany(Animal::class);
    }


}
