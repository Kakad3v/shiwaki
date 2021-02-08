@extends('layouts.app') 

@section('content')
<div class="container mt-24">
    <h1 class="mx-auto sm:text-center mb-3 text-xl font-semibold text-gray-600">Toa Nasaha Yako</h1>
        @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto">
        <form class="p-4" action="{{route('store-quote')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Chimbuko</label
                >
                <input
                    type="text"
                    name="source"
                    id="source"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
            </div>
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Mwili</label
                >
                <textarea
                    type="text"
                    name="body"
                    id="body"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                    rows="5"
                ></textarea>
            </div>

            <div>
                <button 
                type="submit"
                class="bg-blue-400 px-4 py-1 rounded-full text-white text-xl outline-none shadow w-full sm:block sm:w-auto"
                >Chapisha</button>
            </div>
        </form>
    </div>
</div>
@endsection


