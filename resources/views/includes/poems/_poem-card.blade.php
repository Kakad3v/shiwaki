<div class="bg-white rounded-xl shadow-lg sm:shadow-md overflow-hidden mt-2 h-100">
    <div class="image">
        <img
            src="{{$poem->poster()}}"
            alt=""
            loading="lazy"
            class="h-56 w-full object-contain {{$poem->image_path ? 'object-cover' : 'object-contain'}}"
        />        
    </div>
    <div class="content p-3 flex flex-col">
        <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
            {{$poem->title}}
        </h3>    
        <div class="flex flex-col justify-between ">
            <div class="mt-3 text-base leading-6 text-gray-600 ashmif-content flex-1">
                <article class="h-full flex-1">
                {!! Str::of($poem->body)->words(10,'...')!!} 
                </article>    
            </div>   
            <div class="w-full mt-3">
                <div class="author-details flex items-center">
                    <img
                        class="h-10 w-10 rounded-full mr-2"
                        src="{{asset('storage' . '/'. $poem->user->avatar())}}"
                        alt=""
                    />
                    <div>
                        <p class="text-sm leading-5 font-medium text-gray-900">{{$poem->user->name}}</p>
                        <div class="flex text-sm leading-5 text-gray-500">
                            <time datetime="2020-03-25"
                                >{{$poem->created_at->toFormattedDateString()}}</time
                            >
                        </div>
                    </div>
                </div>
            </div> 
        </div>       
    </div>
</div>