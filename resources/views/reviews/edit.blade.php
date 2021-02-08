@extends('layouts.app') 

@section('content')
<div class="container mt-6">
        <h1 class="mx-auto sm:text-center mb-3 text-xl font-semibold text-gray-600">Hariri Makala</h1>
        @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto mt-6">
        <form class="p-4 text-lg" action="{{route('update-review',$review->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Kichwa</label
                >
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                    value="{{$review->title}}"
                />
            </div>
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Mwili</label
                >
                <input id="x" type="hidden" name="body" value="{{$review->body}}">
                <trix-editor input="x" class="trix-content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="review_cover" class="text-sm block text-gray-600"
                    >Picha</label
                >
                <input
                    type="file"
                    name="review_cover"
                    id="review_cover"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
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
                class="bg-blue-400 px-3  py-2 sm:py-1 rounded-full text-white shadow font-semibold"
                >Chapisha</button>
            </div>
        </form>
    </div>
</div>
@endsection


