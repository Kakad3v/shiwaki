@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-lg w-full">
    <div>
      <h2 class="mt-6 text-center sm:text-3xl text-xl leading-9 font-extrabold text-gray-900">
        Create the tranaslation project
      </h2>
      <p class="mt-2 text-center text-sm leading-5 text-gray-600">
        <span href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
          Attachements will be added later*
        </span>
      </p>
    </div>
    <form class="mt-8" action="{{route('save-work')}}" method="POST">
        @csrf
      <div class="rounded-md shadow-sm">
        <div class="mb-2">
          <input aria-label="Project title" name="title" type="title" required class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Project Title" />
        </div>
        <div class="-mt-px">
          <textarea aria-label="Description" name="description" type="description" required class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Description" rows="7"></textarea>
        </div>
      </div>

      <div class="mt-6">
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-base leading-5 font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="h-6 w-6 text-white group-hover:text-indigo-400 transition ease-in-out duration-150"><path d="M12 4v16m8-8H4"></path></svg>
          </span>
          Create Project
        </button>
      </div>
      
    </form>
  </div>
</div>    
@endsection