<?php


namespace App\Http\Controllers\Api;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Imports\ExcelImport;


use Validator;
use Illuminate\Http\JsonResponse;

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
        
        // return $request->email;
        // return $request->password;


        // if(empty($_REQUEST['email']))
        // {
          
        
        // }


        if (empty($request->password) && (empty($request->email)) )  {
            return response()->json(['message' => 'Password and email missing' , 'status' => false , 'data' => []], 400);
        }

        elseif(empty($request->email)) {
            return response()->json(['message' => 'Email missing' ,'status' => false , 'data' => []], 400);
        }

            elseif(empty($request->password)) {
                return response()->json(['message' => 'Password missing', 'status' => false , 'data' => []], 400);
            }
        
        // Yahan aap kuch aur code likhein, jaise ki email ke saath koi action lena, ya phir simply null response bhejna
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('agent')->attempt($credentials)) {
            // Authentication passed...
          
    
            $user = Auth::guard('agent')->user();
            if(!$user->status) {
                return response()->json(['message' => 'your account is not active' , 'status' => false , 'data' => []], 400);
            }
            $record['name']=$user->name;
            $record['email']=$user->email;
            $record['passwprd']=$user->password;
            $record['state']=$user->state;
            $record['city']=$user->city;
            $record['address']=$user->address;
            $record['mobile_number']=$user->mobile_number;
            $record['status']=$user->status;
            $record['commission']=$user->commission;
            
            $token=  $user->createToken($request->device ?? 'web')->plainTextToken;
            

       return response([
        'status' => true,
        'data' => $record,'token'=>$token,
        'message' => 'Login successfully'
    ]);

        }

        return response()->json(['error' => 'status folls'], 401);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function agentlogout()
{
    // return 'drgregre';
    try {
        auth()->guard('agent')->user()->tokens()->delete();
        return response()->json(['message' => 'Logout successfully', 'status' => true , 'data' => []], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}


