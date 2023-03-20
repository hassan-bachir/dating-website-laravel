<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;



//GET USERS
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

    //ADD TO FAVORITES
    public function addFavorite(Request $request)
    {
        $currUserID = Auth::id();

        $request->validate([
            'id' => 'required',
        ]);

        $favID = $request->only('id');

        $mytime = Carbon::now();
        $mytime->setTimezone('Asia/Jerusalem');

        $values = array('user1_id' => $currUserID, 'user2_id' => $favID['id'], 'created_at' => $mytime);

        $query = DB::table('favorites')->where([
            ['user1_id', '=', $currUserID],
            ['user2_id', '=', $favID['id']]
        ])->get();

        if (count($query) > 0) {
            return response()->json([
                'status' => 'No Edits',
                "data" => count($query)
            ]);
        }

        $query = DB::table('favorites')->insert($values);

        return response()->json([
            'status' => 'success',
            "data" => $query
        ]);
    }



public function blockUser(request $request){

    $currentID = Auth::id();
    
    $request->validate([
        'id' => 'required',
    ]);

    
    $blockID = $request->only('id');
    
    $mytime = Carbon::now();
    $mytime->setTimezone('Asia/Jerusalem');

    $values = array('user1_id' => $currentID, 'user2_id' => $blockID['id'], 'created_at' => $mytime);

    $query = DB::table('blocks')->where([
        ['user1_id', '=', $currentID],
        ['user2_id', '=', $blockID['id']]
    ])->get();

    if (count($query) > 0) {
        return response()->json([
            'status' => 'No Edits',
            "data" => count($query)
        ]);
    }
    
    $query = DB::table('blocks')->insert($values);

    return response()->json([
        'status' => 'success',
        "data" => $query
    ]);



}


public function editProfile(request $request){
    $user =  Auth::user();

    if($request['name']){
        $user -> name = $request['name'];
    }

    if ($request['email']) {
        $user->email = $request['email'];
    }
    if ($request['password']) {
        $user->password = Hash::make($request->password);
    }
    if ($request['mobile']) {
        $user->phone_number = $request['mobile'];
    }
    if 

}
}