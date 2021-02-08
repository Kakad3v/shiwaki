@extends('layouts.app') 
@section('content')
<div class="container-tags">
    <header class="bg-white sm:px-12 sm:py-6 p-6 mx-auto shadow-sm sm:flex justify-between items-center">
        <h1 class="text-lg text-gray-700">
            Karibu,
            <span class="text-blue-300">{{auth()->user()->name}}</span>
            &#x1F91F;
        </h1>
        <a href="{{route('admin.users.index')}}">Rudi</a>
    </header>
    <div class="container mt-2">
        <div class="bg-white p-3 w-full sm:w-1/3 shadow-sm flex justify-around rounded-lg shadow-sm my-2">
            <form class="mt-2 flex items-center mx-auto" action="{{route('admin.tags.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input class="p-2 rounded-lg border-2 border-green-200 mr-2 bg-gray-100 outline-none" type="text" name="name" id="tag" placeholder="Add a tag">
                </div>
                <div class="form-group">
                    <button class="bg-green-400 px-4 py-2 rounded-full text-white font-semibold" type="submit">Ongeza Kitambulisho</button>
                </div>            
            </form>           
        </div>
        <div class="grid grid-cols-3 sm:grid-cols-8">
            @forelse ($tags as $tag)
                <div class="bg-white mt-2 mr-2 rounded p-2 text-center shadow-sm text-gray-700">
                    {{$tag->name}}
                </div>
            @empty
                <p>Hakuna vitambulisho</p>
            @endforelse
        </div>       
    </div>
</div>
@endsection
