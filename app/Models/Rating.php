<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    // use HasFactory;
    public $timestamps = false;
    // protected $table = "ratings";

    // protected $fillable = [
    //     'rating',
    // ];

    use HasFactory;
    protected $table = "ratings";

    protected $fillable = [
        'rating',
        
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    
}
