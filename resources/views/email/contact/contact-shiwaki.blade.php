<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Shiwaki - Contact</title>
        <link
            href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
            rel="stylesheet"
        />
    </head>

    <body class="bg-gray-100">
        <div class="bg-white container">
            <h1 class="text-lg">
                Welcome to <a href="https://ashmifconsult.com">Shiwaki</a>
            </h1>
            <div class="bg-">
                <p>
                    Thank you for showing an interest in Shiwaki
                </p>
                <div>
                    <h2>Below the trending articles</h2>
                    @foreach ($articles as $article)
                        <a href="{{$article->path()}}">{{$article->title}}</a>
                        <p>{{$article->body}}</p>
                        <span>Writteb by {{$article->user->name}}</span>
                        <img src="{{asset($article->user->avatar())}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
