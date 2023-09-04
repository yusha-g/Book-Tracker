<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelves extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function books(){
        return $this->belongsToMany(Book::class, 'shelf_junction','shelf_id','book_id');
    }
}
