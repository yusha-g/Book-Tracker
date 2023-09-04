<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'start_date',
        'end_date',
        'personal_rating'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shelves(){
        //intermediate table, foreign keys in the intemediary table
        return $this->belongsToMany(Shelves::class, 'shelf_junction','book_id','shelf_id');
    }
}
