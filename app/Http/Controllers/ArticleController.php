<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select(
            'articles.*',
            'etudiants.nom as etudiant_nom'
        )
        ->join('etudiants', 'articles.userid', '=', 'etudiants.userId')
        ->orderBy('articles.date', 'DESC')
        ->get(); //récupérer tous les articles de la DB */

        return  view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'contenu'=>'required|min:10|max:1000'
        ]);

        $article = new Article();
        $article->fill($request->all());
        $article->userId = session()->get('etudiant')->userId;
        $article->date = Carbon::now()->format('Y-m-d');
        $article->save();

        return redirect(route('article.index')); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if(session()->get('etudiant')->userId == $article->userId){
            $request->validate([
                'title'=>'required',
                'contenu'=>'required|min:10|max:1000'
            ]);

            $article->update([
                'title'=>$request->title,
                'contenu'=>$request->contenu,
                'langue'=>$request->langue,
                'date'=> Carbon::now()->format('Y-m-d')
            ]);
        }
        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(session()->get('etudiant')->userId == $article->userId){
            $article->delete();
        }
        return redirect(route('article.index')); 
    }
}
