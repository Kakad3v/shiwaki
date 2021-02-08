@extends('layouts.app') 

@section('content')
<div class="container mt-6 relative">
    <div class="sm:flex sm:justify-start hidden sm:ml-8">
        <a
            class="bg-blue-400 px-3 py-1 rounded-full text-white shadow sm:mr-8 font-semibold hover:no-underline"
            href="{{route('new-poem')}}"
            >Chapisha Shairi</a
        >
    </div>
    <div
        class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
    >
        @forelse ($poems as $poem)
        <a href="{{$poem->path()}}" class="no-underline hover:no-underline">
            @include('includes.poems._poem-card')
        </a>
        @empty
        <p>Hakuna shairi lililochapishwa</p>
        @endforelse
    </div>
    {{$poems->links()}}
</div>
<a href="{{route('new-poem')}}" class="sm:hidden absolute fixed z-50 w-12 h-12 bg-green-300 rounded-full flex items-center justify-around shadow-outline" style="bottom:50px; right:30px; position:fixed;"><svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-white"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
@endsection
