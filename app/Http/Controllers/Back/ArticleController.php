<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

use Intervention\Image\ImageManagerStatic as Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','ASC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpge,png,jpg'

        ]);
        $articles =new Article();
        $articles->title=$request->title;
        $articles->content=$request->content;

/*
        if($request->hasFile('image')){

            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'),$imageName);
        $articles->image='uploads/'.$imageName;
    }*/
    $images =$request->image;
    $imageName=time().'.'.$images->getClientOriginalExtension();
    $img=Image::make($images->getRealPath());
    $img->resize(320,240);
    $img->save(public_path('uploads/').$imageName);
    $articles->save();
    return redirect()->route('makaleler.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles=Article::findOrFail($id);
        return view('back.articles.update',compact('articles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpge,png,jpg|max:2048'

        ]);
        $articles =Article::findOrFail($id);
        $articles->title=$request->title;
        $articles->content=$request->content;


        if($request->hasFile('image')){

        $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'),$imageName);
        $articles->image='uploads/'.$imageName;
    }
  
    $articles->save();
    return redirect()->route('makaleler.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        Article::find($id)->delete();
        return redirect()->route('makaleler.index');
    }
    public function destroy(string $id)
    {
        //
    }
}
