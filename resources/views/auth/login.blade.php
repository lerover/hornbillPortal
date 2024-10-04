<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employer Sign-Up</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="min-h-screen w-full bg-stone-300 flex justify-center items-center">
    <div class="w-full max-w-3xl bg-gradient-to-br from-blue-300 to-sky-400 shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-orange-500 mb-6 text-center">
            Login
        </h1>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-1">Email</label>
                <input name="email" type="text" placeholder="Email Address"
                    class="w-full input  rounded px-3 py-2 outline-none border-red-500" value="{{ old('email') }}"
                    {{--                for condition of error --}}
                    @error('email')
                style="border-width: medium"
                @enderror />
                {{-- for condition of error --}}
                @error('email')
                    <p class="mt-2 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-1">Password</label>
                <input name="password" type="password" placeholder="Password"
                    class="w-full input input-bordered border-red-500 rounded px-3 py-2" {{--                for condition of error --}}
                    @error('password')
                style="border-width: medium"
                @enderror />
                {{-- for condition of error --}}
                @error('password')
                    <p class="mt-2 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-orange-500 text-white rounded py-2 mt-4 font-semibold hover:bg-orange-600">
                Login
            </button>
        </form>

        <small class="block text-center mt-4 font-bold">(You have to login first to be able to apply the job applications.)</small>
    </div>
</body>

</html>
