@extends('base')

@section('title' ,'Blog')

@section('content')

    <h1>Blog</h1>

    @foreach( $articles as $article)
        <ul>
            <li>
                <h3>{{$article->title}}</h3>
            <p>{{$article->content}}</p>
            <p>{{$article->author}}</p>
            <p>{{$article->created_at}}</p></li>
            <button><a href="/articles/show/{{ $article->id }}">afficher plus</a></button>
        </ul>
    @endforeach
    <div class="d-flex align-items-end flex-column mb-3">
<button class="btn btn-primary ms-auto"><a href="/articles/create">créer un nouvel article</a></button>
    </div>

    {{$articles->links()}}
@endsection
