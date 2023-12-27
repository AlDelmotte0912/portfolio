<Form method="post">
        @csrf

        <div class="form-group">
            <label>titre: </label>
            <input type="text" class="form-control" name="title" value="{{ old('title' , $article->title)}}">
            @error("title")
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="">contenu: </label>
            <textarea name="content" class="form-control">{{ old('content' , $article->content)}}</textarea>
            @error("content")
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label>Author </label>
            <input type="text" class="form-control" name="author" value="{{ old('author' ,  $article->author)}}">
            @error("author")
            {{$message}}
            @enderror
        </div>

        <p> <button type="submit" class="btn btn-primary m-4">
                @if($article->id)
                    Modifier
                @else
                Créer
                    @endif
            </button></p>
    </Form>
