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
    	return view('home')->with('articles', Article::all());
    }

    public function detail()
    {

    }

     public function create()
    {
       // dd(storage_path() . "/app/public/images");

        $file = $this->request->file('article_image');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
     echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
  
      //Move Uploaded File
      $destinationPath = storage_path() . "/app/public/images";
      $file->move($destinationPath,$file->getClientOriginalName());
    }

}
