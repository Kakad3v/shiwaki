@extends('layouts.app')

@section('content')
    <div class="container mt-6">
        <h1 class="text-2xl text-gray-600 py-2">Translated works</h1>
        <div class="grid sm:grid-cols-3 gap-2">
        @forelse ($works as $work)
            <div class="bg-white rounded-lg shadow flex flex-col overflow-hidden">
                <div class="text-center pt-3">
                    <a href="{{route('show-tx-work',$work->id)}}" class="text-2xl text-gray-800 hover:text-gray-800 block hover:no-underline">{{$work->swahili_title}}</a>
                    <span class="text-gray-600 text-sm">{{$work->author}}</span>  
                </div>
                <a href="{{route('show-tx-work',$work->id)}}" class="ashmif-content text-base p-3 tracking-wide flex-1 hover:no-underline text-gray-700 hover:text-gray-700">
                    {!!$work->swahili_body!!}
                </a>
                <div class="bg-blue-100 flex justify-between items-center px-3 py-2">
                    <div class="flex flex-col items-center" title="Story contributor">
                        <div>
                            <img class="w-10 h-10 border-2 border-white object-cover rounded-full" src="{{asset('storage' .'/' . $work->user->avatar())}}" alt="">
                            
                        </div>
                        <span class="text-gray-600">{{$work->user->username}}</span>
                    </div>
                    <div class="flex flex-col items-center" title="Original story link">
                        <span><svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-600"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg></span>
                        <a class="text-blue-300 hover:text-blue-300 hover:no-underline" href="{{$work->original_url}}" target="_">{{$work->foreign_title}}</a>
                    </div>                    
                    <div class="flex flex-col items-center text-gray-600">
                        <span>Ilichapishwa</span>
                        <small>{{$work->created_at->toFormattedDateString()}}</small>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
        </div>
    </div>
@endsection