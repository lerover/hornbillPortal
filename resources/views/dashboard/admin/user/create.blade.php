@extends('dashboard.layout.admin')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3>Users</h3>
        <a href="{{ route('users.index') }}" class="btn btn-success btn-sm"><i
                class="fa-solid fa-arrow-right-from-bracket"></i> Back</a>
    </div>

    <div class="overflow-x-auto bg-white p-6 shadow-md rounded-lg">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Userame</label>
                <input type="text" id="name" name="name"
                    class="input input-bordered w-full p-3 text-gray-700 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter username" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="input input-bordered w-full p-3 text-gray-700 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="input input-bordered w-full p-3 text-gray-700 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter password" required>
            </div>


            <div class="mb-4 ">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" id="role"
                    class=" select select-bordered w-full p-3 text-gray-700 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="0">Employee</option>
                    <option value="1">Employer</option>
                    <option value="2">Admin</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('users.index') }}" class="btn btn-outline btn-sm mr-2">Cancel</a>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Create
                    User</button>
            </div>
        </form>
    </div>
@endsection
