@extends('layouts.app') 

@section('content')
<div class="container">
    <header class="p-6 bg-indigo-400 rounded-b-lg shadow-md">
        <div class="flex items-center text-white justify-between">
            <h1 class="text-2 font-semibold text-xl">Dashboard</h1>
            <p class="relative">
                <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    class="sw:8 h-8 m:w-12 sm:h-12"
                >
                    <path
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    ></path>
                </svg>
                {{-- <span class="absolute -mt-10 sm:ml-3 border-green-300 rounded-full w-6 h-6 flex justify-center items-center">2</span> --}}
            </p>
        </div>
    </header>
    <main class="content-fit">
        Content
    </main>
    <div class="other-stuff">
        Other stuff
    </div>
</div>
@endsection
