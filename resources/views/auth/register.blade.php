<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employer Sign-Up</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body
    class="min-h-screen w-full bg-stone-300 flex justify-center items-center"
>
<div
    class="w-full max-w-3xl bg-gradient-to-br from-blue-300 to-sky-400 shadow-lg rounded-lg p-8"
>
    <h1 class="text-3xl font-bold text-orange-500 mb-6 text-center">
        Employer Sign-Up
    </h1>

    <form action="" method="POST">
        @csrf
        <!-- Name -->
        <div class="mb-4">
            <label class="block text-gray-600 text-sm font-medium mb-1"
            >Name</label
            >
            <input
                name="name"
                type="text"
                placeholder="Full Name"
                class="w-full input  rounded px-3 py-2 outline-none border-red-500 focus:border-gray-300"
                value="{{ old('name') }}"
                {{--                for condition of error--}}
                @error('name')
                    style="border-width: medium"
                @enderror
            />
            {{--for condition of error--}}
            @error('name')
                <p class="mt-2 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-600 text-sm font-medium mb-1"
            >Email</label
            >
            <input
                name="email"
                type="text"
                placeholder="Email Address"
                class="w-full input  rounded px-3 py-2 outline-none border-red-500"
                value="{{ old('email') }}"
                {{--                for condition of error--}}
                @error('email')
                style="border-width: medium"
                @enderror
            />
            {{--for condition of error--}}
            @error('email')
            <p class="mt-2 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</p>
            @enderror

        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-gray-600 text-sm font-medium mb-1"
            >Password</label
            >
            <input
                name="password"
                type="password"
                placeholder="Password"
                class="w-full input input-bordered border-red-500 rounded px-3 py-2"
                {{--                for condition of error--}}
                @error('password')
                style="border-width: medium"
                @enderror
            />
            {{--for condition of error--}}
            @error('password')
            <p class="mt-2 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</p>
            @enderror

        </div>

        <!-- Website URL -->
        <div class="mb-4">
            <label class="block text-gray-600 text-sm font-medium mb-1"
            >Website URL</label
            >
            <input
                name="website"
                type="url"
                placeholder="Website URL"
                class="w-full input input-bordered border-red-500 rounded px-3 py-2"
                value="{{ old('website') }}"
                {{--                for condition of error--}}
                @error('website')
                style="border-width: medium"
                @enderror
            />
            {{--for condition of error--}}
            @error('website')
            <p class="mt-2 text-sm text-red-600"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</p>
            @enderror

        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-gray-600 text-sm font-medium mb-1">Address</label>
            <textarea name="address" id="address" rows="5" class="w-full input-bordered rounded px-3 py-2 border-red-500">{{ old('address') }}</textarea>

        </div>


        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full bg-orange-500 text-white rounded py-2 mt-4 font-semibold hover:bg-orange-600"
        >
            Sign Up
        </button>
    </form>
</div>
</body>
</html>
