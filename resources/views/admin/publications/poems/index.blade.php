@extends('layouts.app') @section('content')
<div class="container-users">
    <header class="bg-white p-6  mx-auto shadow-sm flex items-center justify-between">
        <h1 class="text-lg text-gray-700">
            Welcome back,
            &#x1F91F;
        </h1>
        <a href="{{route('admin.users.index')}}"><svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-600"><path d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg></a>
    </header>
    <div class="flex flex-col container mt-3 mb-12">
        <h1 class="mb-2 text-gray-600 text-xl">Manage poems</h1>
        <div
            class="-my-2 py-2 overflow-x-auto overflow-y-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
        >
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
            >
                <table class="min-w-full">
                    <thead class="bg-blue-300 text-white">
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold text-white uppercase tracking-wider"
                            >
                                Author
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold text-white uppercase tracking-wider"
                            >
                                Title
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold text-white uppercase tracking-wider"
                            >
                                Published
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold text-white uppercase tracking-wider"
                            >
                                Status
                            </th>
                            @can('manage_users')
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-semibold text-white uppercase tracking-wider"
                            >
                                Actions
                            </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($poems as $poem)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img
                                            class="h-10 w-10 rounded-full"
                                            src="{{asset('storage'.'/'. $poem->user->avatar())}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <div
                                            class="text-sm leading-5 font-medium text-gray-900"
                                        >
                                            {{$poem->user->name}}
                                        </div>
                                        <div
                                            class="text-sm leading-5 text-gray-500"
                                        >
                                            {{$poem->user->username}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$poem->title}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$poem->created_at->toFormattedDateString()}}
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"
                            >
                              {!!$poem->status()!!}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium"
                            >
                            @can('manage_users')
                                <div
                                    class="flex flex-end text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline z-50"
                                >
                                <a href="{{route('admin.poems.show',$poem->id)}}" class="mr-2">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-blue-300"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <a href="{{route('admin.poems.edit',$poem->id)}}" class="mr-2">
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
                                    <div href="{{route('admin.poems.destroy',$poem->id)}}">
                                        <form action="{{route('admin.poems.destroy',$poem->id)}}" method="POST">
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
