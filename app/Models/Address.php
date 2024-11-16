<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'fu',
        'state',
        'city',
        'neighbourhood',
        'street',
        'complement'
    ];

    public function addreable(): MorphTo
    {
        return $this->morphTo();
    }
}
