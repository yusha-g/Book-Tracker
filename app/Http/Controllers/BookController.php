<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BookController extends Controller
{
    public function create(Request $req){
        $validateData = $req->validate([
            'title'=>'required',
            'author'=>'required|alpha',
            'title'=>'required',
            'start_date'=>'date',
            'end_date'=>'date|after_or_equal:start_date',
            'personal_rating'=>'integer|between:1,5'
        ]);

        if(!$validateData){
            return "invalid";
        }

        
    }

    public function read(Request $req){
        return response()->json($req, 200);
    }

    public function update($id){
        return $id;
    }

    public function delete($id){
        return $id;
    }
}
