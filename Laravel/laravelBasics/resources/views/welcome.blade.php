<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
           ::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit; display: flex; align-items: center;justify-content: center}
           </style>
    </head>
    <body class="antialiased">
        <div class="relative flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <h1>Todo list</h1>


            <!-- form pour ajouter de nouveaux items-->
            <form method="post" action="{{route('saveItem')}}">
<!--a mettre dans tout les form . sert pour securiser-->
                {{csrf_field()}}
                <label for="listItem"> New Todo item</label><br>
                <input type="text" name="listItem"><br><br>
                <button type="submit">Save item</button>
            </form>




            <!-- Affichage liste des items-->
            @foreach($listItems as $listItem)
                <div class="flex" style="display: flex; align-items: center;">
                    <p>Item: {{$listItem->name}}</p>
                    <form method="post" action="{{ route('markComplete' , $listItem->id)}}">
                        {{csrf_field()}}
                    <button type="submit" style="max-height: 25px; margin-left: 20px;">mark complete</button>
                    </form>
                </div>
            @endforeach

        </div>
        <button><a href="/login">cliquez ici pour vous connecter </a></button>
    </body>
</html>
