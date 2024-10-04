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

    <style>
        /* Core styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .navbar {
            padding:0 0;
            margin:0;

            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .navbar .btn {
            font-weight: 500;

        }

        .hero-section {
            display: flex;
            justify-content: space-between;
            padding: 4rem 2rem;
            height: 80vh;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 50%;
        }

        .hero-content h1 {
            font-size: 4.5rem;
            line-height: 1.2;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: #555;
            margin-bottom: 2rem;
        }

        .hero-content .btn-cta {
            padding: 0.75rem 1.5rem;
            font-size: 1.25rem;
            background-color: #1a73e8;
            color: white;
            border-radius: 0.375rem;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .hero-content .btn-cta:hover {
            background-color: #0c63d4;
        }

        .card {
            background-color: white;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }

        .card p {
            margin: 0.5rem 0;
        }

        .login-box {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            padding: 1.5rem;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            text-align: center;
        }

        .login-box h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .login-box a {
            color: #1a73e8;
            font-size: 1rem;
            text-decoration: none;
        }

        .login-box a:hover {
            text-decoration: underline;
        }

        .bg-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        footer {
            background-color: #fff;
            padding: 1rem 2rem;
            text-align: center;
            font-size: 0.875rem;
            color: #999;
        }

        footer small {
            margin: 0 1rem;
        }
    </style>
</head>

<body>

<header class="navbar bg-blue-500 h-[30px]">
    <div class="bg-blue-500 h-full w-full mx-auto flex justify-between px-4 font-bold">
        <a class="text-2xl font-bold text-gray-800">Job-Hydro</a>
        <div class="flex space-x-4">
            @if (auth()->user())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline text-gray-600 border-gray-400">Logout</button>
                </form>
                <a href="#" class="btn btn-error">{{ auth()->user()->name }}</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-accent text-gray-600 border-gray-400 ">Login</a>
                <a href="{{ url('/register/employer') }}" class="btn btn-warning text-gray-800">Register as Company</a>
                <a href="{{ url('/register/employee') }}" class="btn btn-neutral text-white">Register as Job Seeker</a>
            @endif
        </div>
    </div>
</header>

<main class="hero-section container mx-auto">
    <div class="hero-content">
        <h1>Hire Top Local Developers</h1>
        <p>Great execution and pixel-perfect work delivered by our expert team. Let's make your project come to life!</p>
        <a href="{{route('newsfeed.home')}}" class="btn-cta">Get Started (Join for Free) <i class="fa-solid fa-arrow-right ml-2"></i></a>
    </div>

    <div class="bg-photo">
        <img src="{{ asset('storage/images/officebg.png') }}" alt="Office Background">
    </div>

    {{-- Login Box --}}
    @if (!auth()->user())
        <div class="login-box ms-[55px] mb-[30px]">
            <h3>Start Posting Job Positions</h3>
            <a href="{{ url('/register/employer')}}">Sign Up <i class="fa-solid fa-arrow-right ml-1"></i></a>
        </div>
    @endif
</main>

<footer class="w-full">
    <small>Privacy Policy</small>
    <small>Terms & Conditions</small>
</footer>

<!-- Scripts -->
<script type="module" src="/src/main.js"></script>
</body>

</html>
