<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use Validator;
use File;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth', ['except' => 'login']);
    	$this->request = $request;
    }

    public function articles()
    {
        return view('admin-articles')->with('articles', Article::orderBy('id', 'desc')->get());
    }

    public function view()
    {

        $article = Article::find($this->request->id);

        if ($article)
        {
            return view('admin-view-article')->with('article', $article);
        }

        return redirect()->route('admin.articles');
    }

    public function edit()
    {

        $article = Article::find($this->request->id);

        if ($article)
        {
            return view('admin-edit-article')->with('article', $article);
        }

        return redirect()->route('admin.articles');
    }

    public function create()
    {
        return view('admin-create-article');
    }

    public function postUpdate()
    {

        $article = Article::find($this->request->id);

        if ($article)
        {

            $validator = Validator::make($this->request->all(), [
                'title' => 'required|max:255|min:5',
                'content' => 'required|min:5'
            ]);

            if($validator->fails()) {
                return redirect()->back()->with('error', 'error occured')->withInput();
            }

            $article->title = $this->request->title;
            $article->content = $this->request->content;
            $article->update();

            if ($this->request->file('image')) {
                $file = $this->request->file('image');

                $destinationPath = storage_path() . "/app/public/articles/";
                $fileName = "{$article->id}_" . time() . ".jpg";
                if ($file->move($destinationPath,$fileName))
                {
                    $article->image = $fileName;
                    $article->update();
                }
            }
            
            return view('admin-view-article')->with('article', $article);
        }

        return redirect()->route('admin.articles');
    }

    public function postCreate()
    {

        $validator = Validator::make($this->request->all(), [
            'title' => 'required|unique:articles|max:255|min:5',
            'content' => 'required|min:5',
            'image' => 'required',
        ]);

        if($validator->fails()) {
             return redirect()->back()->with('error', 'error occured')->withInput();
        }


        $article = new Article();
        $article->title = $this->request->title;
        $article->content = $this->request->content;
        $article->created_by = Auth::user()->id;
        $article->save();

        $file = $this->request->file('image');
        $file2 = $this->request->file('image');

        // $path = storage_path() . "/app/public/articles2";
        // $destinationPath2 = storage_path() . "/app/public/articles2/{$article->id}/";
        // File::makeDirectory($path, $mode = 0777, true, true);
        // $fileName = "{$article->id}_" . time() . ".jpg";
        // $file2->move($destinationPath2,$fileName);

        $destinationPath = storage_path() . "/app/public/";
        $fileName = "{$article->id}_" . time() . ".jpg";
        if ($file->move($destinationPath,$fileName))
        {
            $article->image = $fileName;
            $article->update();
        }
        
        return redirect()->route('admin.articles');
    }

    public function login()
    {
    	return view('login');
    }

}
