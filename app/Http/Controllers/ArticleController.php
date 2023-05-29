<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __invoke(Request $request) {
        $code = $request->query('code');
        $name = $request->query('name');
        $tag = $request->query('tag');

        if (!empty($code)) {
            $articles = Article::where('code', 'like', '%'.$code.'%')->paginate(20);
        }

        if (!empty($name)) {
            $articles = Article::where('name', 'like', '%'.$name.'%')->paginate(20);
        } 

        if (!empty($tag)) {
            $tagsIDs = Tag::where('name', 'like', '%'.$tag.'%')->pluck('id')->toArray();
            $articlesIDs = DB::table('article_tag')->whereIn('tag_id', $tagsIDs)->pluck('article_id')->toArray();
            $articles = Article::whereIn('id', $articlesIDs)->paginate(20);
        } 
        
        if (empty($code) and empty($name) and empty($tag)) {
            $articles = DB::table('articles')->paginate(20);
        }

        return view('posts')->with('articles', $articles)->with('code', $code)->with('name', $name)->with('tag', $tag);
    }
}
