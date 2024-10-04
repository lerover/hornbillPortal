<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
<header class="navbar bg-blue-500 h-[30px]">
    <div class="bg-blue-500 h-full w-full mx-auto flex justify-between px-4 font-bold">
        <a href="{{url('newsfeed/home')}}" class="text-2xl font-bold text-gray-800">Job-Hydro</a>
        <div class="flex space-x-4">
            @if (auth()->user())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-warning  border-gray-400">Logout</button>
                </form>
                <a href="#" class="btn btn-error">{{ auth()->user()->name }}</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-accent text-gray-600 border-gray-400 ">Login</a>
                <a href="{{ url('/register/employer') }}" class="btn btn-warning text-gray-800">Register</a>
            @endif
        </div>
    </div>
</header>

<div class="container mx-auto p-8">
    <!-- Profile Card -->
    <div class="card lg:card-side bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Profile Image -->
        <div class="w-full lg:w-1/4 p-8 bg-blue-500 text-center">
           <h2 class="text-white text-3xl font-semibold">{{$user->name}}</h2>
            <p class="text-blue-200">Email: {{$user->email}}</p>
        </div>

        <!-- Profile Details -->
        <div class="w-full lg:w-3/4 p-8">
            <h2 class="text-3xl text-center font-black mb-4">History</h2>

            <div class="overflow-x-auto">
                @if($applications->count()!=0)
                <table class="table table-xs">
                    <thead>
                    <tr>
                        <th>Job</th>
                        <th>Email</th>
                        <th>Experience</th>
                        <th>Expected Salary</th>
                        <th>Applied_at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $index=>$application)
                        <tr>
                            <th>{{$application->job->position}}</th>
                            <th>{{$application->email}}</th>
                            <th>{{$application->experience}}</th>
                            <th>{{$application->expected_salary}}</th>
                            <th>{{$application->created_at->diffForHumans()}}</th>
                            <th>
                                @switch($application->status)
                                    @case(0)
                                        <div class="badge badge-warning p-2 text-white gap-2 badge-xs text-[9px]">
                                            Pending
                                        </div>
                                        @break

                                    @case(1)
                                        <div class="badge bg-green-800 p-2 text-white gap-2 badge-xs text-[9px]">
                                            Accept
                                        </div>
                                        @break

                                    @case(2)
                                        <div class="badge bg-red-600 p-2 text-white gap-2 badge-xs text-[9px]">
                                            Reject
                                        </div>
                                        @break
                                @endswitch
                            </th>
                            <th class="flex ">
                                    <form action='{{url('newsfeed/profile/'.$application->id.'/delete')}}' method="post">
                                        @csrf
                                        <button type="submit" id="2" class="btn btn-error btn-xs text-white"><i class="fa-solid fa-trash"></i> </button>
                                    </form>
                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @else
                <h1 class="text-center text-xl font-semibold text-gray-400">This is no application at the moment</h1>
                    @endif
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome (for Icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
