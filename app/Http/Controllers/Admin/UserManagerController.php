<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function userManager(){
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('admin.user_manager')->with('users', $users);
    }
    
    
    public function blockManager(Request $request, User $user){
        if($user->block){
            $user->block = false;
            $user->save();
            
        }
        else{
            $user->block = true;
            $user->save();
            
        }
        return redirect(route('userManager'));
    }
}
