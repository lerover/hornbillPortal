@extends('employer.layout.master')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3>Categories</h3>
        <a href="{{ url('employer/category') }}" class="btn btn-success btn-sm"><i
                class="fa-solid fa-arrow-right-from-bracket"></i> Back</a>
    </div>

    <div class="overflow-x-auto bg-white p-6 shadow-md rounded-lg">
        <form action="{{ url('employer/category') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                <input type="text" id="name" name="name"
                    class="input input-bordered w-full p-3 text-gray-700 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-600 ring-1 ring-red-600 @enderror"
                    placeholder="Enter category name"
                    value="{{old('name')}}">
            </div>
            @error('name')
                <div class="text-error flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    {{$message}}</div>
            @enderror
            <div class="flex justify-end">
                <a href="{{ url('employer/category') }}" class="btn btn-outline btn-sm mr-2">Cancel</a>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Create
                    Category</button>
            </div>
        </form>
    </div>
@endsection
