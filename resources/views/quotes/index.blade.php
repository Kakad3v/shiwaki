@extends('layouts.app') 
@section('content')
<div class="container mt-6">
    <h1 class="text-2xl text-gray-700 sm:ml-8 sm:mb-2">Nasaha</h1>
    <div class="sm:flex sm:justify-start hidden sm:ml-8">
        <a
            class="bg-blue-400 px-3 py-1 rounded-full text-white shadow sm:mr-8 font-semibold hover:no-underline"
            href="{{route('new-quote')}}"
            >Andika Nasaha</a
        >
    </div>
    <div
        class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
    >
        @foreach ($quotes as $quote)
        <div class="bg-white rounded shadow-sm flex flex-col">
            <div class="p-6 flex-1">
                <p class="mb-2 px-1 text-lg">
                    {{$quote->body}}
                    <i
                        class="fas text-sm text-gray-400 fa-quote-right ml-2"
                    ></i>
                </p>

                <span
                    class="flex justify-end italic text-gray-600 font-semibold"
                    >{{$quote->source}}</span
                >
            </div>
             @if (Auth::check()) 
                    @if($quote->user->id===auth()->user()->id)
                    <div class="flex justify-end items-end mt-2 mr-3">
                        <a
                            href="{{route('edit-quote',$quote->id)}}"
                            class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                            href=""
                            >Hariri</a
                        >
                        <div class="">
                            <form action="{{route('delete-quote',$quote->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button
                                    class="bg-red-400 px-3 rounded-full text-white outline-none focus:outline-none "
                                    type="submit"
                                >
                                    Futa
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif 
                @endif
            <div class="border-t border-green-300 mt-2 px-6 py-2 bg-gray-200">
                <span class="text-sm text-gray-500">Imesambazwa na</span>
                <a
                    class="ml-2 text-sm text-blue-300"
                    href="{{route('member-profile',$quote->user->username)}}"
                    >{{$quote->user->name}}</a
                >
            </div>
            <div class="rounded-b-lg flex justify-around flex-wrap py-1 bg-white items-center">
            <div class="fb-share-button mb-1" 
                data-href="shiwaki.net/quotes" 
                data-layout="button_count">
            </div>

            <a class="twitter-share-button "
                href="https://twitter.com/intent/tweet?text='{{ (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"}}"
                data-size="large">
                <i class="fab fa-twitter text-blue-500"></i>
            </a>
            <a  class="" href="whatsapp://send?text={{'https://shiwaki.net/nasaha'}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp text-green-600"></i></a>

            
        </div>              
        </div>
        @endforeach
    </div>

    <div class="sm:ml-8">
        {{$quotes->links()}}
    </div>
</div>
<a href="{{route('new-quote')}}" class="sm:hidden absolute fixed z-50 w-12 h-12 bg-green-300 rounded-full flex items-center justify-around shadow-outline" style="bottom:50px; right:30px; position:fixed;"><svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-white"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
@endsection
