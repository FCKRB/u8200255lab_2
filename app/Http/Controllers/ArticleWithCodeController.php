<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Exception;

class ArticleWithCodeController extends Controller
{
    public function __invoke(Request $request, string $code) {
        try {
            $article = Article::where('code', $code)->firstOrFail();
            $tagsIDs = DB::table('article_tag')->where('article_id', '=', $article->id)->pluck('tag_id')->toArray();
            $tags = Tag::orderBy('name', 'desc')->whereIn('id', $tagsIDs)->pluck('name')->toArray();

            return view('post')->with('tags', $tags)->with('article', $article);
        } catch (Exception) {
            abort(404, 'Article is not found.');
        }
    }
}
