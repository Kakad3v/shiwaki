@extends('layouts.app') 

@section('content')
<div class="container mt-6">
    <h1 class="mx-auto sm:text-center mb-3 text-xl font-semibold text-gray-600">Chapisha Hadithi</h1>
        @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto">
        <form class="p-4 text-lg" action="{{route('store-story')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Kichwa</label
                >
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
            </div>
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Mwili</label
                >
                <input id="x" type="hidden" name="body">
                <trix-editor input="x" class="trix-content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="tags" 
                class="text-sm block text-gray-600"
                    >Vitambulisho</label
                >
                <select name="tags[]" multiple class="appearance-none bg-gray-100 p-2 rounded">
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
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


