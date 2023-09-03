<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(Request $req){
        return response()->json($req, 200);
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
