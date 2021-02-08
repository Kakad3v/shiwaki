@extends('layouts.app') 

@section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div class="text-center my-3">
            <h2 class="text-2xl text-gray-700 leading-6 mt-2 text-center font-semibold">
                {{$review->title}}
            </h2>
            <span class="text-xs text-gray-600 italic">{{$review->created_at->toFormattedDateString()}}</span>
        </div>
        <div>
            <img
                class="object-cover w-full"
                src="{{asset('storage' . '/' . $review->image_path)}}"
                alt=""
            />
        </div>
        <div>
            <div class="p-3">
                <div class="text-gray-700 mt-3 text-lg ashmif-content">
                    {!! $review->body !!}
                </div>
                @can('update',$review)
                        <div class="flex justify-end items-end mt-2">
                            <a
                                href="{{route('edit-review',$review->slug)}}"
                                class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                                href=""
                                >Hariri</a
                            >
                            <div class="">
                                <form
                                    action="{{route('delete-review',$review->slug)}}"
                                    method="POST"
                                >
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
            @include('reviews._review-comments')
        </div>
    </div>

    <div class="block sm:flex-1 sm:ml-4 rounded">
        <h1 class="my-3 sm:hidden text-base text-blue-400">Imechapishwa na</h1>
        <div class="shadow-sm bg-white rounded-lg px-4 p-3">
            <div class="author-info flex items-center mx-auto">
                <div>
                    <img
                        class="w-12 h-12 rounded-full mr-1"
                        src="{{asset('storage'.'/'. $review->user->avatar())}}"
                        alt=""
                    />
                </div>
                @if ($review->user->isVerified())
                <span class="verified">
                    <img
                        class="w-4 mx-1 rounded-full"
                        src="{{asset('images/verified.png')}}"
                        alt=""
                    />
                </span>                    
                @endif
                <span class="text-2xl text-gray-700"
                    >{{$review->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-green-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$review->user->username)}}"
                >
                    Tazama Wasifu
                </a>
            </div>
        </div>
        <div class="rounded-lg flex flex-wrap p-2 items-center text-2xl justify-around">
            <div class="fb-share-button mr-3 mb-1" data-href="shiwaki.net/{{$review->path()}}" data-layout="button_count">
            </div>
            <a class="twitter-share-button flex items-center mt-2"
                href="https://twitter.com/intent/tweet?text={{'https://shiwaki.net/' . $review->path()}}"
                data-size="large">
                <i class="fab fa-twitter text-blue-500"></i>
            </a>
            <a  class="mt-2" href="whatsapp://send?text={{'https://shiwaki.net/' . $review->path()}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp text-green-600"></i></a>
        </div>
                @if ($review->tags->count()>0)
        <div
            class="bg-white rounded-lg flex justify-around flex-wrap p-2 mt-2 shadow-xs"
        >
            @forelse ($review->tags as $tag)
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
                href="{{route('reviews',['tag'=>$tag->name])}}"
                >{{$tag->name}}</a
            >
            @empty 
            
            @endforelse
        </div>
        @else
        <p class="bg-white rounded-lg p-3 mt-2 shadow-sm text-gray-600">
            Makala haya hayana vitambulisho
        </p>
        @endif
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
               Mengine kutoka kwa
                <span class=""><a href="">{{$review->user->name}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_reviews as $review)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-review',$review->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                        <div class="ashmif-content">
                            @include('includes.reviews._review-card')
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
