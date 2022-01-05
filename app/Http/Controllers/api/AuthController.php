<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    //

    public function index(){
        // USAR essa cena para nao sincronizar de novo
        $cachedUsers =Redis::get('users');

        if(isset($cachedUsers)){

            $users= json_decode($cachedUsers,FALSE);

            return response()->json(['response'=>['message'=>true, 'data'=>$users,'redis'=>true]],200);
        }else{

            $users= User::all();

            Redis::set('users',$users);
            return response()->json(['response'=>['message'=>true, 'data'=>$users]],200);

        }


    }

//     public function login(AuthRequest $request){

//         $user = null ;
//         try {
//             //code...
//           if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
//             $user = User::where('username','=',$request->username)->first();
//             $user->tokens()->delete();
//           }

//             return response()->json(['response'=>['message'=>true, 'data'=>$user->createToken($user->username)]],200);
//         } catch (\Throwable $th) {
//             //throw $th;
//             return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=>$th->getMessage()]],500);

//     }
//     }

//     public function signup(SignUpRequest $request){

//         $user=User::all()->count();
//         $data=$request->all();
//         $data['password'] = bcrypt($request->password);
//         $data['utilizador_id']="AG$user";

//         try {
//             //code...

//             $user = User::create($data);
//             return response()->json(['response'=>['message'=>true, 'data'=>$user]],200);
//         } catch (\Throwable $th) {
//             //throw $th;
//             return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=>$th->getMessage()]],500);

//     }
// }

public function login(AuthRequest $request){

    $user = null ;
    try {
        //code...

      if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
        $user = User::where('username','=',$request->username)->first();
      }

        return response()->json(['response'=>['message'=>true, 'data'=>$user]],200);
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=>$th->getMessage()]],500);

}
}

public function signup(SignUpRequest $request){

    $user=User::all()->count();
    $data=$request->all();
    $data['password'] = bcrypt($request->password);
    $data['utilizador_id']="AG$user";

    try {
        //code...

        $user = User::create($data);
        return response()->json(['response'=>['message'=>true, 'data'=>$user]],200);
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=>$th->getMessage()]],500);

}
}

}
