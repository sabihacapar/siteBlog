<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class Homepage extends Controller
{
    public function index(){

        $articles=Article::all();
        $categories = Category::all();
        return view("front.homepage", ["categories" => $categories,"articles"=>$articles]);
       
       
    }


    public function single($slug){

        $articles =Article::where('slug',$slug)->first() ?? abort(404,'Böyle bir yazı bulunamadı');


        return view('front.single', ["articles"=>$articles]);
    }
}
