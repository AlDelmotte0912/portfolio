@extends("base")
@section('title' , 'sign in')
@section('content')

    <h1>Créer un compte</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{route('users.signIn')}}" method="post" class="ystack gap-3">
                @csrf
                <div class="form-group">
                    <label for="name">Nom: </label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ old('name')}}">
                    @error("name")
                    {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                    @error("email")
                    {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" id="password" name="password"}}>
                    @error("password")
                    {{ $message }}
                    @enderror
                </div>

                <button class="btn btn-primary">Créer mon compte</button>
            </form>
        </div>
    </div>
@endsection
