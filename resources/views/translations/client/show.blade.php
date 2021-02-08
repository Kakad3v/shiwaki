@extends('layouts.app') @section('content')
<header
    class="container bg-indigo-600 px-4 py-3 rounded-b shadow text-white mb-3"
>
    <div class="flex justify-between items-center">
        <a class="hover:text-white hover:no-underline text-lg" href="{{route('translate-index')}}" class="text-xl">Work<span class="font-bold">Board</span></a>
        <a
            href="{{route('submit-work')}}"
            class="bg-green-400 text-white px-3 py-1 flex justify-between rounded-full text-lg shadow no-underline hover:no-underline"
            >Submit Work</a
        >
    </div>
</header>

<div class="container sm:flex sm:justify-between" style="min-height: 30vh;">
    <div
        class="project-main bg-green-100 sm:flex-1 mb-2 sm:mr-4 rounded shadow-sm"
    >
        <section class="secription p-3 text-gray-700 tracking-wide leading-7">
            <h1 class="text-2xl text-center mb-2">{{$project->title}}</h1>
            <p class="text-lg text-gray-600">
                {{$project->description}}
            </p>
        </section>
        @include('translations.client.includes.comments')
    </div>
    <div
        class="project-meta sm:w-1/3 bg-white rounded shadow-sm"
        {{-- style="max-height: 570px;" --}}
    >
        <div class="client-avatar p-3 flex flex-col text-center">
            <img
                class="w-12 h-12 rounded-full object-cover items-center mx-auto border-2 border-green-200"
                src="{{'/storage' . '/' . $project->user->avatar()}}"
                alt=""
            />
            <span class="text-gray-700 text-sm">{{$project->user->name}}</span>
        </div>
        <div class="flex justify-between p-3 items-center">
            <h1 class="text-gray-600 text-lg">{{$project->title}}</h1>
            <p
                class="bg-pink-300 px-2 rounded-full text-white font-bold shadow-sm"
            >
                Ongoing
            </p>
        </div>
        <div class="project-files">
            <div class="p-3">
                    @forelse ($project->requestfiles as $file)
                        @include('translations.client.includes.file')
                    @empty
                    <div class="mt-6 text-gray-600">
                        <p>
                            No project files yet
                        </p>
                        <p class="text-sm text-gray-500">Added files will appear here</p>
                    </div>                        
                    @endforelse
            </div>
        </div>

        <h1 class="px-3 mb-1 text-gray-600">Add a file</h1>
        <form
        method="POST"
        action="{{route('add-file',$project->sub_url)}}"
        enctype="multipart/form-data"
            class="flex pl-3 justify-between border-t-2 border-b-2 border-dashed border-green-200 py-2"
        >
        @csrf
            <input type="file" name="project_file" id="" />
            <button
                class="px-3 bg-blue-300 mr-4 rounded-full text-white shadow-sm font-semibold"
                type="submit"
            >
                Save
            </button>
        </form>
        {{-- <div class="flex px-3 justify-between mt-2">
            <p class="text-gray-600">Assigned to</p>
            <span class="text-blue-300">Suleiman Nassor</span>
        </div> --}}
        <div class="flex px-3 justify-between pt-3 pb-2">
            <p class="text-gray-600">Posted</p>
            <span class="text-blue-300"
                >{{$project->created_at->diffForHumans()}}</span
            >
        </div>
        @can('manage', $project) 
            @include('translations.client.includes.invite')
        @endcan
    </div>
</div>
@endsection
