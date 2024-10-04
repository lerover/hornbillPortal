@extends('dashboard.layout.admin')
@section('content')
    <div>
        @foreach($user as $name)
            {{$name->name}}'s Posts
        @endforeach
    </div>

    <div>
        <a href="{{url('admin/posts')}}" class="btn btn-primary btn-sm">Back</a>
    </div>
    <div class="grid grid-cols-2 gap-3">
        @foreach($posts as $post)
            <div class="card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <small>{{$post->created_at->diffForHumans()}}</small>
                    </div>
                    <h2 class="font-black">Category : <span>{{$post->category->name}}</span></h2>
                    <h2 class="font-black">Salary: {{$post->salary}}</h2>
                    <h2 class="font-black">Description :</h2>
                    <p class="max-h-[200px] overflow-y-scroll">{{$post->description}}</p>
                    <div class="card-actions justify-start">
                        <form action="{{url('admin/posts/postdetails/'.$post->id.'/show_hide')}}" method="POST">
                            @csrf
                            @if($post->showhide_status === 'hide')
                                <button type="submit" class="btn btn-primary btn-sm">Show</button>
                            @else
                                <button type="submit" class="btn btn-error btn-sm">Hide</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
