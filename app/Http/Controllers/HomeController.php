<?php

namespace App\Http\Controllers;

use App\Models\appconst;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $articleQuery = Article::query();
        $articleQuery->where('hidden',false);
        $articleQuery->whereHas('user', function($query){
            $query->where('block',false);
        });
        $articleQuery->where('valid_date', '>=', \Carbon\Carbon::now()->toDateString());
        if($request->category_ids){
            $articleQuery->whereHas('categories', function($query) use ($request){
                $query->whereIn('categories.id', $request->category_ids);
            });
        }
        if($request->province_id){
            $articleQuery->where('province_id', $request->province_id);
            if($request->district_id){
                $articleQuery->where('district_id', $request->district_id);
                if($request->ward_id){
                    $articleQuery->where('ward_id', $request->ward_id);
                }
            }
        }
        $articles = $articleQuery->latest()->paginate(appconst::HOME_PAGE);
        return view('home')->with('articles', $articles);
    }

    public function getProfile(){
        $user = auth()->user();
        return response()->json($user);
    }
    public function profile(Request $request){
        if($request->id){
            $user = User::whereId($request->id)->first();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            if($request->password){
                $user->password = Hash::make($request->password) ;
            }
            $user->save();
        }
        $user = auth()->user();
        return view('profile')->with('user', $user);
    }
}
