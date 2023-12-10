<?php


namespace App\Http\Controllers\Api;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
//     public function agentLogin(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);
     

//         $agent = (new Agent)->agentLogin($request->email, $request->password);
//    return "rtghr";
//         // if ($agent) {
//         //     $token = $agent->createToken('agent-token')->plainTextToken;

//         //     return response()->json(['token' => $token, 'agent' => $agent]);
//         // } else {
//         //     return response()->json(['error' => 'Invalid credentials'], 401);
//         // }
        
//     }

public function agentlogin(Request $request)
{
    try {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('agent')->attempt($credentials)) {
            // Authentication passed...
            $user = Auth::guard('agent')->user();
            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['token' => $token], 200);

        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


// public function agentlogin(){ 
//     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
//         $user = Auth::agent(); 

//      return   $success['token'] =  $user->createToken('authToken')-> accessToken; 
//         // return response()->json(['success' => $success], $this-> successStatus); 
//     } 
//     else{ 
//         return response()->json(['error'=>'Unauthorised'], 401); 
//     } 
// }
    
}

