<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserList extends Controller
{
    //
    public function __invoke()
    {
        $user = Auth::user();
        if($user->id != 1){
            return new Response('You are not authorized to view this page!', 403);
        }
        $users = User::all();
        return new Response(json_encode($users));
    }
}
