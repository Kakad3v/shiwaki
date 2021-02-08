<div class="bg-white flex flex-col rounded-xl shadow-md sm:shadow-md overflow-hidden mt-2">
    <div class="flex-shrink-0 shadow-sm">
        <img
            src="{{asset('storage'.'/'. $article->image_path)}}"
            alt=""
            loading="lazy"
            class="h-48 w-full object-cover"
        />
    </div>
    <div class="section-content p-6 flex flex-col justify-between">
        <div class="flex-1">
            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                {{$article->title}}
            </h3>
            <div
                class="mt-3 text-base leading-6 text-gray-600 ashmif-content flex-1"
            >
                {!!Str::of($article->body)->words(12,'...')!!}
        </div>
    </div>
    <div class="author flex items-center mt-6">
        <div class="flex-shrink-0">
            <img
                class="h-10 w-10 rounded-full"
                src="{{asset('storage' . '/'. $article->user->avatar())}}"
                alt=""
            />
        </div>
        <div class="flex justify-between items-center w-full">
            <div class="author-details ml-3">
                <p class="text-sm leading-5 font-medium text-gray-900">
                    {{$article->user->name}}
                </p>
                <div class="flex text-sm leading-5 text-gray-500">
                    <time datetime="2020-03-25"
                        >{{$article->created_at->toFormattedDateString()}}</time
                    >
                </div>
            </div>
            <div class="text-pink-300 mr-6 flex items-center">
                <button type="submit" class="text-sm flex items-center">
                    <span class="mr-1 text-base"
                        >{{$article->comments->count()}}</span
                    >
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-6 h-6 font-normal"
                    >
                        <path
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                        ></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
