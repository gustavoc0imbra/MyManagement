<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_id',
        'name',
        'description',
        'costPrice',
        'sellingPrice',
        'imgPath'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function formatedDate(Carbon $date)
    {
        return Carbon::parse($date)->format('d/m/y H:i:s');
    }
}
