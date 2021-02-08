<div class="bg-white flex flex-col rounded-xl shadow-lg overflow-hidden mt-2">
    <div class="mx-auto flex-shrink-0 mt-8 border-2 border-green-300 rounded-full h-12 w-12 text-center justify-center overflow-hidden">
        <img
            src="{{asset('storage'.'/'. $story->user->avatar())}}"
            alt=""
            class="h-12 rounded-full mx-auto object-cover shadow-sm"
        />
    </div>
    <div class="section-content flex-1 flex flex-col justify-between min-h-6 trix-content">
        <div class="flex-1 p-6">
            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900 text-center">
                {{$story->title}}
            </h3>
            <div class="mt-3 text-base leading-6 text-gray-600 trix-content">
                <div class="">
                    {!!Str::of($story->body)->words(20,'</div>')!!}
                </div> 
            </div>   
        </div>
        <div class="author flex items-center mt-6 bg-gray-100 py-3 px-6">
            <div class="w-full">
                <div class="author-details flex justify-between items-center">
                    <p class="text-base leading-5 font-medium text-blue-400">
                        {{$story->user->name}}
                    </p>
                    <div class="flex text-sm leading-5 text-gray-600 italic">
                        <time datetime="2020-03-25">{{$story->created_at->toFormattedDateString()}}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
