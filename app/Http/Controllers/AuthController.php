<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function register(Request $req){
        $validateUser = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ]);

        if($validateUser -> fails()){
            $res = [
                'success'=>false,
                'message'=> $validateUser -> errors()
            ];

            return response()->json($res, 400);
        }

        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>bcrypt($req->password)
        ]);

        $token = $user->createToken(time())->plainTextToken;

        $res =[
            'success'=>true,
            'message'=>'User Successfully Registered',
            'token'=>$user->createToken(time())->plainTextToken
        ];
        return response()->json($res, 200);
    }

    public function login(Request $req){
        if(Auth::check() && Auth::user()->email === $req->email ){
            return Auth::user()->email." is Already Logged In!";
        }

        $validateUser = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if($validateUser -> fails()){
            $res = [
                'success'=>false,
                'msg'=>$validateUser->errors()
            ];
            return response()->json($res,400);
        }
        
        if(!Auth::attempt([
            'email'=>$req->email,
            'password'=>$req->password]
        ))
        {
            $res = [
                'success'=>false,
                'msg'=>'Log In Failed'
            ];
            return response()->json($res, 401);
        }

        $user = Auth::user();
        $res =[
            'success'=>true,
            'msg'=>'User Successfully Logged In',
            'user_id'=>$user->id,
            'token'=>$user->createToken(time())->plainTextToken
        ];
        return response()->json(
            $res,200
        ); 
    }

    public function logout(){
        return "out";
    }
}
