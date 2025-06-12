<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Animal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'animales';

    public function habitat(): BelongsTo
    {
        return $this->BelongsTo(Habitat::class);
    }
}
