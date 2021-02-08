@extends('layouts.app')

@section('content')
<div class="container">
<div
    class="sm:min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
>
    <div class="max-w-md w-full">
        <div>
            <h2
                class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900"
            >
                Create your account
            </h2>
        </div>
        <form class="mt-8" action="{{route('register')}}" method="POST">
            @csrf
            <div class="rounded-md">
                <div class="mb-2">
                    <input
                        aria-label="Name"
                        name="name"
                        type="text"
                        required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                        placeholder="Your name"
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
                    />
                                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="mb-2">
                    <input
                        aria-label="Password"
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        class="@error('password') is-invalid @enderror appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                        placeholder="Password"
                    />
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                    <input
                        id="password-confirm"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        aria-label="Confirm password"
                        type="password"
                        required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                        placeholder="Confirm password"
                    />
                </div>
            </div>

            <div class="mt-6">
                <button
                    type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
                >
                    <span
                        class="absolute left-0 inset-y-0 flex items-center pl-3"
                    >
                        <svg
                            class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                            ></path>
                        </svg>
                    </span>
                    Create your account
                </button>
            </div>
            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center">
                    Already have an account ?
                </div>

                <div class="text-sm leading-5">
                    @if (Route::has('password.request'))
                    <a
                        class="btn btn-link"
                        href="{{ route('login') }}"
                    >
                        {{ __('Login to your account') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>


</div>
@endsection
