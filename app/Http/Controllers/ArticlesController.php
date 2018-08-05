<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;

class ArticlesController extends Controller
{
  public function __construct(Request $request)
  {
      $this->request = $request;
  }

  public function home()
  {
  	return view('home')->with('articles', Article::limit(config('app.articles_per_page'))->orderBy('updated_at', 'desc')->get());
  }

  public function view()
  {
    $article = Article::find($this->request->id);

    if ($article)
    {
        return view('article-view')->with('article', $article);
    }

    return redirect()->route('articles');
  }

  public function archive()
  {
    return view('article-archive')->withArticles(
      Article::orderBy('updated_at', 'desc')->paginate(config('app.articles_per_page'))
    );
  }
}
