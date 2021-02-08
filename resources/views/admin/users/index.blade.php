@extends('layouts.app') @section('content')
<div class="container-users">
    <header class="bg-white sm:px-12 sm:py-6 p-6 mx-auto shadow-sm sm:flex justify-between items-center">
        <h1 class="text-lg text-gray-700 hidden sm:block">
            Welcome back,
            <span class="text-blue-300">{{auth()->user()->name}}</span>
            &#x1F91F;
        </h1>
        <div class="hidden sm:flex  items-center uppercase font-semibold">
            <div class="mr-2 bg-green-400 px-3 py-1 text-white rounded-full shadow "><a href="{{route('admin.articles.index')}}" class="hover:no-underline hover:text-white">Articles</a></div>
            <div class="mr-2 bg-blue-400 px-3 py-1 text-white rounded-full shadow"><a href="{{route('admin.stories.index')}}" class="hover:no-underline hover:text-white">Stories</a></div>
            <div class="mr-2 bg-red-400 px-3 py-1 text-white rounded-full shadow"><a href="{{route('admin.poems.index')}}" class="hover:no-underline hover:text-white">Poems</a></div>
            <div class="mr-2 bg-indigo-400 px-3 py-1 text-white rounded-full shadow"><a href="{{route('admin.reviews.index')}}" class="hover:no-underline hover:text-white">Reviews</a></div>
            <div class="mr-2 bg-white  px-3 py-1 text-gray-900 rounded-full shadow-outline"><a href="{{route('admin.tags.index')}}" class="hover:no-underline hover:text-gary-900">Tags</a></div>
        </div>

        <div class="sm:hidden flex  items-center uppercase justify-around font-semibold">
            <div class="mr-1 bg-green-400 px-2 py-1 text-white rounded-full shadow "><a href="{{route('admin.articles.index')}}" class="hover:no-underline hover:text-white">Articles</a></div>
            <div class="mr-1 bg-blue-400 px-2 py-1 text-white rounded-full shadow"><a href="{{route('admin.stories.index')}}" class="hover:no-underline hover:text-white">Stories</a></div>
            <div class="mr-1 bg-red-400 px-2 py-1 text-white rounded-full shadow"><a href="{{route('admin.poems.index')}}" class="hover:no-underline hover:text-white">Poems</a></div>
            <div class="mr-1 bg-indigo-400 px-2 py-1 text-white rounded-full shadow"><a href="{{route('admin.reviews.index')}}" class="hover:no-underline hover:text-white">Reviews</a></div>
            <div class="mr-2 bg-white  px-3 py-1 text-gray-900 rounded-full shadow-outline"><a href="{{route('admin.tags.index')}}" class="hover:no-underline hover:text-gray-900">Tags</a></div>
        </div>
    </header>
    <div class="flex flex-col container mt-3 mb-12">
        <h1 class="mb-2 text-gray-800 text-xl">Manage site users</h1>
        <div
            class="-my-2 py-2 overflow-x-auto overflow-y-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
        >
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
            >
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Name
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Username
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Roles
                            </th>
                            @can('manage_users')
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Actions
                            </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img
                                            class="h-10 w-10 rounded-full"
                                            src="{{asset('storage' . '/' . $user->avatar())}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <div
                                            class="text-sm leading-5 font-medium text-gray-900"
                                        >
                                            {{$user->name}}
                                        </div>
                                        <div
                                            class="text-sm leading-5 text-gray-500"
                                        >
                                            {{$user->email}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$user->username}}
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"
                            >
                                {{implode(', ',$user->roles()->get()->pluck('label')->toArray())}}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium"
                            >
                            @can('manage_users')
                                <div
                                    class="flex flex-end text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline z-50"
                                >
                                    <a href="{{route('admin.users.edit',$user->id)}}" class="mr-2">
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            viewBox="0 0 24 24"
                                            class="w-8 h-8 text-gray-500"
                                        >
                                            <path
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                            ></path>
                                        </svg>
                                    </a>
                                    <div href="{{route('admin.users.destroy',$user->id)}}">
                                        <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            viewBox="0 0 24 24"
                                            class="w-8 h-8 text-red-500"
                                        >
                                            <path
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                            ></path>
                                        </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div>Test</div> --}}
</div>
@endsection
