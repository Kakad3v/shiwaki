<div class="flex items-center p-1 border-b mb-1 border rounded">
    <svg
        fill="none"
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        viewBox="0 0 24 24"
        class="w-6 h-6 text-sm mr-2 text-gray-600 font-normal"
    >
        <path
            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
        ></path>
    </svg>
    <span class="w-full text-gray-600">{{$file->name}}</span>
    <a
        href="{{asset('storage' . '/' . $file->file_path)}}"
        target="_"
        class="text-indigo-600 hover:no-underline text-semibold"
        ><svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-6 h-6 text-gray-600"
        >
            <path
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
            ></path></svg
    ></a>
</div>
<div class="text-xs text-gray-500 flex items-center justify-between mb-2 -mt-1">
    <span
        >Uploaded by
        <a
            class="text-blue-400 hover:no-underline hover:text-blue-400"
            href="{{route('member-profile',$file->user->username)}}"
            >{{$file->user->username}}</a
        >
    </span>
    <small class="italic">{{$file->created_at->diffForHumans()}}</small>
</div>
