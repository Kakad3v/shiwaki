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
<div class="container" style="">
    <div class="w-full">
        <div class="projects-card sm:grid sm:grid-cols-3 gap-5">
            @foreach ($projects as $project)
            <div
                class="project-card rounded-lg mt-3 shadow-sm bg-white flex flex-col overflow-hidden"
            >
                <div
                    class="flex justify-between border-b border-b border-blue-200 p-3 items-center"
                >
                    <div class="flex items-center">
                        <img
                            class="h-10 w-10 inline-block border-2 border-green-300 shadow sm:shadow-sm object-cover rounded-full"
                            src="{{asset('storage'.'/'. $project->user->avatar())}}"
                            alt="User Avatar"
                        />
                        @foreach ($project->members as $member)
                        <img
                            class="h-10 w-10 -ml-2 inline-block border-2 border-green-300 shadow sm:shadow-sm object-cover rounded-full"
                            src="{{asset('storage' . '/' . $member->avatar())}}"
                            alt="User Avatar"
                        />                            
                        @endforeach
                    </div>
                    <span
                        class="bg-red-300 px-2 rounded-full text-white font-bold shadow-sm"
                        >New</span
                    >
                </div>
                <div class="proect-details">
                    <h1 class="text-center mt-3 text-gray-600 text-2xl">{{$project->title}}</h1>

                    <div class="description text-lg p-3 text-gray-700">
                        <p>
                            {{Str::of($project->description)->words(12,'...')}}
                        </p>
                    </div>
                </div>
                @if ($project->requestfiles->count()>0)
                 <h1 class="text-lg text-gray-600 mt-6 px-3">Project files</h1>
                @endif
                <div class="px-3 flex justify-between my-2 flex-1">
                    <div class="w-full">
                    @forelse ($project->requestfiles as $file)
                        @include('translations.client.includes.index-file')
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
                <footer class="bg-gray-100 p-3 flex justify-between items-center">
                    <p><span>{{$project->user->name}}</span></p>
                    <p>Posted <span>{{$project->created_at->diffForHumans()}}</span></p>
                </footer>
                <div>
                    <a
                        href="{{$project->path()}}"
                        class="bg-blue-400 block w-full py-2 text-lg hover:no-underline font-semibold text-center text-white flex-1 mb-0"
                        >View Project</a
                    >
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
