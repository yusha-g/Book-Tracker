<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelfJunction extends Model
{
    use HasFactory;
    protected $primaryKey = ['book_id', 'shelf_id'];
    protected $fillable = [
        'book_id','shelf_id'
    ];
}
