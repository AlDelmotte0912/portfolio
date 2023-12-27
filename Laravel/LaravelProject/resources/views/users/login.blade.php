@extends("base")
@section('title' , 'login')
@section('content')

    <h1>Se connecter</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{route('users.login')}}" method="post">
                @csrf
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
                <button class="btn btn-primary">Se connecter</button>
            </form>
            <a href="{{route('users.signIn')}}">pas de compte? créer en un!</a>
        </div>
    </div>

@endsection
