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
        
        $user = Auth::users();
        $data = bd::table('users')
    }
}
