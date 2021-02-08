@extends('layouts.app') 

@section('content')
<div class="container mt-6">
            <h1 class="mx-auto sm:text-center mb-3 text-xl font-semibold text-gray-600">Edit The Article</h1>
        @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto mt-6">
        <form class="p-4 text-lg" action="{{route('edit-article',$article->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Title</label
                >
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                    value="{{$article->title}}"
                />
            </div>
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Body</label
                >
                <input id="x" type="hidden" name="body" value="{!!$article->body!!}">
                <trix-editor input="x" class="ashmif-content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="article_cover" class="text-sm block text-gray-600"
                    >Cover Image</label
                >
                <input
                    type="file"
                    name="article_cover"
                    id="article_cover"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
            </div>
            <div class="form-group">
                <label for="tags" 
                class="text-sm block text-gray-600"
                    >Tags</label
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
                class="bg-blue-400 px-3 text-lg sm:text-base py-1 rounded-full text-white shadow font-semibold"
                >Save Article</button>
            </div>
        </form>
    </div>
</div>
@endsection


