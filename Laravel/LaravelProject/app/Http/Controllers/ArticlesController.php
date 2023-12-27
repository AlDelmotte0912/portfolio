<?php

namespace App\Http\Controllers;


use App\Http\Requests\FormArticlesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\signUpFormRequest;
use App\Models\Articles;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    public function all (): View
    {
        return view('articles.all'
            , [
                'articles' => Articles::paginate(3, ['id' , 'title', 'content' , 'author' , 'created_at'])
            ]);
    }

    public function show($articles) :RedirectResponse | View
    {
        $article = Articles::findorfail($articles);

        return view('articles.show' , [
            'article' => $article
        ]);

    }

    public function create( ) :View {
        $article = new Articles();

        return view('articles.create' ,[
            'article' => $article
        ]);

    }

    public function store(FormArticlesRequest $request) {

        $article = Articles::create($request->validated());

        return redirect()->route('articles.show' , ['article' => $article->id])->with('success' , "L'article a bien été sauvegardé");
    }

    public function edit(Articles $article )
    {

        return view('articles.edit', [
            'article' => $article

        ]);

    }
    public function update(Articles $article, FormArticlesRequest $request)
    {

        $article->update($request->validated());

        return redirect()->route('articles.show', ['article' => $article->id])->with('success', "L'article a bien été modifié");
    }

    public function delete(Articles $article)
    {
        $article->delete();
        return redirect()->route('articles.all')->with('success', "L'article a bien été supprimé");

    }
}
