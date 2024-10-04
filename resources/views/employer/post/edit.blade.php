@extends('employer.layout.master')
@section('content')
    <form action="{{url('employer/post/'.$post->id)}}" method="POST" class="flex flex-col space-y-2">
        @csrf
        @method('PUT')
        <label for="">Job Title</label>
        <input type="text" class="input input-bordered w-full" placeholder="We are hiring!!" name="title" value="{{$post->title}}">

        <label for="">Category</label>
        <select name="category" class="select select-bordered">
            <option disabled selected>Select Category</option>
        @foreach($categories as $category)
                <option value="{{$category->id}}" {{$category->id === $selectedcat ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
        </select>

        <label for="">Position</label>
        <input type="text" class="input input-bordered w-full" placeholder="Enter position" name="position" value="{{$post->position}}">

        <label for="">Salary</label>
        <input type="text" class="input input-bordered w-full" placeholder="Enter your salary" name="salary" value="{{$post->salary}}">

        <label>Description</label>
        <textarea id="" rows="10" class="textarea textarea-bordered" name="description">{{$post->description}}</textarea>

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('employer/post')}}" class="btn btn-neutral">Back</a>
        </div>
    </form>
@endsection
