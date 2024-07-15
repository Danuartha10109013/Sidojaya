<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'review', 
        'id_wisata', 
        'id_user', 
        'id_rating',
    ];

}
