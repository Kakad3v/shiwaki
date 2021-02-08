@extends('layouts.app') @section('content')
<div class="container">
    <main class="">
        <header class="rounded text-center ">
            <div class="bg-white rounded-b flex items-center flex-col pt-3">
                <div class="overflow-hidden">
                    <img
                        class="w-24 object-cover h-24 border-2 border-blue-300 rounded-full"
                        src="{{asset('storage' . '/'. $profileUser->avatar())}}"
                        alt=""
                    />
                </div>
                <div class="sm:w-1/2 sm:flex flex-col justify-between p-3 ">
                    <h1 class="text-xl sm:text-2xl text-gray-700">
                        {{$profileUser->name}}
                    </h1>
                    <p class="text-gray-700 text-base">
                       {{$profileUser->bio}}
                    </p>
                    <p class="text-gray-500 mt-1">
                        Nimejiunga
                        <span class=""
                            >{{$profileUser->created_at->toFormattedDateString()}}</span
                        >
                    </p>
                </div>
                @if (auth()->user()->id===$profileUser->id)
                <div class="mb-4">
                    <a
                        href="{{route("member-profile-edit",$profileUser->username)}}"
                        class="inline-block bg-green-300 px-3 py-1 rounded-full text-white text-lg font-semibold shadow-outline hover:no-underline"
                        >Hariri Wasifu</a
                    >
                </div>                    
                @endif
            </div>
            <div class="py-3 grid grid-cols-2 gap-2 sm:grid-cols-4">
                <div class="border-l-4 border-blue-300 bg-white rounded-lg shadow-sm py-3"><span class="font-semiblod text-blue-300 text-2xl rounded-full">{{$articles->count()}}</span> <h1 class="text-gray-600 text-xl">Habari</h1></div>
                <div class="border-l-4 border-blue-300 bg-white rounded-lg shadow-sm py-3"><span class="font-semiblod text-blue-300 text-2xl rounded-full">{{$reviews->count()}}</span> <h1 class="text-gray-600 text-xl">Makala</h1></div>
                <div class="border-l-4 border-blue-300 bg-white rounded-lg shadow-sm py-3"><span class="font-semiblod text-blue-300 text-2xl rounded-full">{{$stories->count()}}</span> <h1 class="text-gray-600 text-xl">Hadithi</h1></div>
                <div class="border-l-4 border-blue-300 bg-white rounded-lg shadow-sm py-3"><span class="font-semiblod text-blue-300 text-2xl rounded-full">{{$poems->count()}}</span> <h1 class="text-gray-600 text-xl">Mashairi</h1></div>
            </div>
        </header>

        <div class="bg-white mt-3 p-3 rounded-lg border-b-2 border-dashed border-blue-300 mb-3">
            <h1 class="text-xl sm:text-xl text-gray-600">Habari</h1>
            <div class="articles grid sm:grid-cols-3 gap-4">
                @foreach ($articles as $article)
                    <a class="hover:no-underline" href="/{{$article->path()}}">
                        @include('includes.articles._article-card')
                    </a>
                @endforeach
            </div>
        </div>

       <div class="bg-white mt-3 p-3 rounded-lg border-b-2 border-dashed border-blue-300 mb-3">
            <h1 class="text-xl sm:text-xl text-gray-600">Makala</h1>
            <div class="reviews grid sm:grid-cols-3 gap-4">
                @foreach ($reviews as $review)
                    <a class="hover:no-underline" href="/{{$review->path()}}">
                        @include('includes.reviews._review-card')
                    </a>
                @endforeach
            </div>
        </div> 
       <div class="bg-white mt-3 p-3 rounded-lg border-b-2 border-dashed border-blue-300 mb-3">
            <h1 class="text-xl sm:text-xl text-gray-600">Hadithi</h1>
            <div class="stories grid sm:grid-cols-3 gap-4">
                @foreach ($stories as $story)
                    <a class="hover:no-underline" href="/{{$review->path()}}">
                        @include('includes.stories._story-card')
                    </a>
                @endforeach
            </div>
        </div> 
    </main>
</div>
@endsection
