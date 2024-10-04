<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body class="bg-base-200">

    <div class="container mx-auto h-screen flex flex-col">
        <div class="navbar bg-primary text-primary-content shadow-lg flex justify-between items-center">
            <a class="btn btn-ghost text-xl">Job-Hydro</a>
            <div class="flex items-center space-x-2">
                <a href="#" class="btn btn-sm btn-error">{{ auth()->user()->name }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn  btn-warning btn-sm">Logout</button>
                </form>
            </div>
        </div>

        <div class="flex mt-3">
            <div class="drawer lg:drawer-open">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content flex flex-col">
                    <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

                    <div class="card shadow-lg my-4">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="drawer-side">
                    <label for="my-drawer-2" class="drawer-overlay"></label>
                    <ul class="menu bg-base-100 p-4 w-72">
                        <li><a href="{{ route('admin.index') }}" class="hover:text-primary">Dashboard</a></li>
                        <li><a href="{{ route('users.index') }}" class="hover:text-primary">Users</a></li>
                        <li><a href="{{ url('admin/payments') }}" class="hover:text-primary">Payments</a></li>
                        <hr/>
                        <p class="badge badge-accent my-3">Post Management</p>
                        <li><a href="{{url('admin/posts')}}">Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <footer class="footer bg-primary text-primary-content flex justify-between p-4 mt-auto">
            <div>© 2024 Job-Hydro. All rights reserved.</div>
            <div class="flex space-x-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Service</a>
            </div>
        </footer>
    </div>

    <script type="module" src="/src/main.js"></script>
</body>

</html>
