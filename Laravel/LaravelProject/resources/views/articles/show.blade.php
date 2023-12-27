@extends('base')

@section('title' ,'Show article')

@section('content')

    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <p>{{ $article->author }}</p>
    <button type="button" class="btn btn-primary"><a href="/articles/edit/{{ $article->id }}">modifier l'article</a></button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">supprimer l'article</button>

    <!--Modal confirmation suppression -->
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <p>êtes vous sur de vouloir supprimer l'article?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">revenir a l'article</button>
                    <button type="submit" class="btn btn-primary">supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
