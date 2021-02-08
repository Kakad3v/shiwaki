<div class="comments bg-red-100 pb-3 py-4">
    @if($story->storycomments->count() < 1)
    <h1 class="px-3 pt-3 text-gray-600">
        Kuwa wa kwanza kuchangia &#x1F91F;
    </h1>
    @endif @forelse($story->storycomments as $comment)
    <div class="flex flex-col px-3 mb-3">
        <div class="comment flex items-center -mb-1 ">
            <img
                src="{{asset('storage'.'/'. $comment->user->avatar())}}"
                class="w-12 h-12 rounded-full shadow-sm flex-shrink-0 z-10 mb-auto"
                alt=""
            />
            <p
                class="comment-body pl-10 pr-3 py-2 sm:max-w-4/5 bg-white shadow-sm -ml-8 text-gray-800"
            >
                {{$comment->body}}
            </p>
        </div>
        <small class="text-xs flex text-right text-gray-500 italic ml-10">{{$comment->user->name}}</small>
    </div>
    @empty 
    
    @endforelse

    <div class="text-input p-3">
        <form
            class="flex items-center"
            action="{{route('post-story-comment',$story->slug)}}"
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
                    class="bg-green-400 px-4 py-2 h-4/5 comment-btn text-white -ml-3 pl-3 text-lg font-semibold outline-none focus:no-outline active:no-outline"
                >
                    <i class="far fa-1x fa-paper-plane"></i>
                </button>
            </div>
        </form>
        <span class="text-red-500 text-xs"
            >@error('body'){{$message}}@enderror</span
        >
    </div>
</div>
