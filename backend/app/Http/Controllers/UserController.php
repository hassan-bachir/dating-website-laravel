<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    public function getUsers(){
        
        $user = Auth::users();            //hyde enno elli mta3mik block ma bibayyin 3ndak 
        $data = DB::table('users')->leftJoin('blocks','users.id','=','blocks.user2_id')->get()->where('user2_id', '=', '')->where('id', '!=', $user->id)->where('gender', '=', $user->preference);
        $blocks = DB::table('blocks')->where('user1_id', '=', $user->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'blocks' => count($blocks)
        ]);

    }
}
