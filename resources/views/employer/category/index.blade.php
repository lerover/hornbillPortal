@extends('employer.layout.master')
@section('content')
    @if(session()->has('success'))
        <div class="w-1/3 h-16 bg-green-600 text-white rounded-xl flex justify-between items-center p-2 ps-5" id="alert">
            <h1 class="text-lg">{{session()->get('success')}}</h1>
            <button class="btn btn-ghost" onclick="document.querySelector('#alert').addEventListener('click',function(){this.style.display='none'})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h3>Categories</h3>
        <a href="{{url('employer/category/create')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Create
            Category</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <th>{{ $index + 1}}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <form action="{{ url('employer/category/'.$category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('employer/category/'.$category->id.'/edit') }}" class="btn btn-sm btn-accent"
                                    title="edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>

                                <button type="submit" class="btn btn-sm btn-error" title="delete"
                                    onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
