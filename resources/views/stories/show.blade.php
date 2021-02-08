@extends('layouts.app') 

@section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div>
            <div class="p-3">
                <div class="flex flex-col items-center">
                    <h2 class="text-4xl text-gray-900 leading-6 mt-2 text-center">
                        {{$story->title}}
                    </h2>
                    <span class="mt-2 text-xs italic text-gray-600">{{$story->created_at->toFormattedDateString()}}</span>
                </div>
                <div class="text-gray-700 mt-3 sm:text-lg text-base ashmif-content tracking-wider sm:tracking-normal ">
                    {!! $story->body !!}
                </div>
                @can('update',$story)
                    <div class="flex justify-end items-end mt-2">
                        <a
                            href="{{route('edit-story',$story->slug)}}"
                            class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                            href=""
                            >Hariri</a
                        >
                        <div class="">
                            <form action="{{route('delete-story',$story->slug)}}" method="POST">
                                @csrf @method('DELETE')
                                <button
                                    class="bg-red-400 px-3 rounded-full text-white outline-none focus:outline-none "
                                    type="submit"
                                >
                                    Futa
                                </button>
                            </form>
                        </div>
                    </div>
                    @endcan
            </div>
            @include('stories._story-comments')
        </div>
    </div>

    <div class="block sm:flex-1 sm:ml-4 rounded">
        <h1 class="my-3 sm:hidden text-base text-blue-400">Imeandikwa na </h1>
        <div class="shadow-sm bg-white rounded-lg px-4 p-3">
            <div class="author-info flex items-center mx-auto">
                <div>
                    <img
                        class="w-12 h-12 rounded-full"
                        src="{{asset('storage'.'/'. $story->user->avatar())}}"
                        alt=""
                    />
                </div>
                @if ($story->user->isVerified())
                <span class="verified">
                    <img
                        class="w-4 mx-1 rounded-full"
                        src="{{asset('images/verified.png')}}"
                        alt=""
                    />
                </span>                    
                @endif
                <span class="text-2xl text-gray-700"
                    >{{$story->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-green-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$story->user->username)}}"
                >
                    Tazama Wasifu
                </a>
            </div>
        </div>
        <div class="rounded-lg flex flex-wrap p-2 items-center text-2xl justify-around">
            <div class="fb-share-button mr-3 mb-1" data-href="shiwaki.net/{{$story->path()}}" data-layout="button_count">
            </div>
            <a class="twitter-share-button flex items-center mt-2"
                href="https://twitter.com/intent/tweet?text={{'https://shiwaki.net/' . $story->path()}}"
                data-size="large">
                <i class="fab fa-twitter text-blue-500"></i>
            </a>
            <a  class="mt-2" href="whatsapp://send?text={{'https://shiwaki.net/' . $story->path()}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp text-green-600"></i></a>
        </div>
                @if ($story->tags->count()>0)
        <div
            class="bg-white rounded-lg flex justify-around flex-wrap p-2 mt-2 shadow-xs"
        >
            @forelse ($story->tags as $tag)
            <a
                class="
                 @if($tag->name==='Uandishi')
                 bg-green-300
                 @elseif($tag->name==='Fasihi')
                 bg-pink-300
                 @elseif($tag->name==='Maisha')
                 bg-blue-300      
                 @elseif($tag->name==='Biashara')
                 bg-red-300                    
                 @elseif($tag->name==='Dini')
                 bg-indigo-300  
                 @elseif($tag->name==='Dini')
                 bg-purple-300                                                
                 @else
                 bg-purple-500
                 @endif
                 px-3 rounded-full text-white hover:no-underline hover:text-white shadow-sm my-1"
                href="{{route('stories',['tag'=>$tag->name])}}"
                >{{$tag->name}}</a
            >
            @empty 
            
            @endforelse
        </div>
        @else
        <p class="bg-white rounded-lg p-3 mt-2 shadow-sm text-gray-600">
            Hadithi hii haina vitambulisho.
        </p>
        @endif
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
                Hadith nyingine kutoka kwa...
                <span class=""><a href="">{{$story->user->name}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_stories as $story)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-story',$story->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                    <div class="ashmif-content">
                         @include('includes.stories._story-card') 
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
