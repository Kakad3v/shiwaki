<section class="interaction p-3">
    <h1
        class="text-center text-lg text-gray-600 mb-2 border-b border-green-200 pb-3"
    >
        Project progress discussions
    </h1>
    <div class="comments-all pt-3">
        @foreach($project->requestcomments as $comment)
        <div class="single-comment mt-2">
            <div class="comment px-3 flex items-center">
                <img
                    src="{{'/storage' . '/' . $comment->user->avatar()}}"
                    class="w-12 h-12 rounded-full shadow-sm flex-shrink-0 z-10 mb-auto"
                    alt=""
                />
                <p
                    class="comment-body pl-10 pr-3 py-2 sm:max-w-4/5 bg-white shadow-sm -ml-8 text-gray-800 text-sm sm:text-base"
                >
                    {{$comment->body}}
                </p>
            </div>
            <div>
            <span class="ml-16 mb-3 italic text-xs text-gray-500"
                >{{$comment->user->name}}</span>
            <span class="ml-16 mb-3 italic text-xs text-gray-500"
                >{{$comment->updated_at->diffForHumans()}}</span
            >            
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-input p-3">
        <form
            class="flex items-center"
            action="{{route('save-comment',$project->sub_url)}}"
            method="POST"
        >
            @csrf
            <input
                name="body"
                class="comment w-full sm:w-4/5 p-3 pl-8 shadow-sm border-l-2 border-green-400 outline-none text-gray-700"
                type="text"
                placeholder="Comment on the post..."
            />
            <div class="">
                <button
                    type="submit"
                    class="bg-blue-400 px-4 py-2 flex-shrink-0 comment-btn text-white -ml-3 pl-3 text-lg font-semibold outline-none focus:no-outline active:no-outline"
                >
                    <i class="far fa-1x fa-paper-plane"></i>
                </button>
            </div>
        </form>
        <span class="text-red-500 text-xs"
            >@error('body'){{$message}}@enderror</span
        >
    </div>
</section>
