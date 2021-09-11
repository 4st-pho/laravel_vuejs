<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appconst;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function main(){
        return view('admin.manage');
    }


    
   
}
