<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function formatedDate()
    {
        return Carbon::parse($this->created_at)->format('d/m/y H:i:s');
    }
}
