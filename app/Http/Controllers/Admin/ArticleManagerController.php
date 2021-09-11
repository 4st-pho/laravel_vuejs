<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appconst;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleManagerController extends Controller
{
    public function articleManager(){
        $articles = Article::query()->latest()->paginate(appconst::HOME_PAGE);
        return view('admin.article_manager')->with('articles', $articles);
    }
    
    public function vipManager(Request $request, Article $article){
        if($article->vip){
            $article->vip = false;
            $article->save();
            
        }
        else{
            $article->vip = true;
            $article->save();
            
        }
        return redirect(route('articleManager'));
    }
    public function displayManager(Request $request, Article $article){
        if($article->hidden){
            $article->hidden = false;
            $article->save();
            
        }
        else{
            $article->hidden = true;
            $article->save();
            
        }
        return redirect(route('articleManager'));
    }
}
