@extends('layouts.app') @section('content')
<div class="container">
    <div
        class="sm:min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
        <div class="max-w-md w-full">
            <div>
                <h2
                    class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900"
                >
                    Edit user details
                </h2>
            </div>
            <form class="mt-8" action="{{route('admin.users.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="rounded-md">
                    <div class="mb-2">
                        <input
                            aria-label="Name"
                            name="name"
                            type="text"
                            required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                            placeholder="Your name"
                            value="{{$user->name}}"
                        />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input
                            aria-label="Email address"
                            name="email"
                            type="email"
                            required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                            placeholder="Email address"
                            value="{{$user->email}}"
                        />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input
                            aria-label="Email address"
                            name="username"
                            type="username"
                            required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                            placeholder="username address"
                            value="{{$user->username}}"
                        />
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                        <div class="max-w-full flex items-center justify-between rounded-lg bg-white mb-2 relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5">
                            @foreach ($roles as $role)
                          <div class="flex items-center flex-wrap">
                            <input 
                            type="checkbox" 
                            name="roles[]" 
                            value="{{$role->id}}"
                            @if ($user->roles()->pluck('role_id')->contains($role->id))
                               checked 
                            @endif
                            >
                            <label class="mt-2 ml-1 text-gray-600" for="role">{{$role->label}}</label>
                          </div>
                    @endforeach

                        </div>
                </div>

                <div class="mt-6">
                    <button
                        type="submit"
                        class=" text-lg group relative w-full flex justify-center py-2 px-4 border border-transparent text-base leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
                    >
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
