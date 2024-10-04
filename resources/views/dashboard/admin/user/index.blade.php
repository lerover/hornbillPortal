@extends('dashboard.layout.admin')
@section('content')
    <form action="{{url('admin/users/search')}}" method="post" class="flex items-center mt-3">
        @csrf
        <input type="text" placeholder="Search here" name="usersearch" class="input input-bordered w-full me-3"/>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="flex justify-between items-center mb-4">
        <h3>User Lists</h3>
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Create
            Users</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role == '2')
                                Admin
                            @elseif ($user->role == '1')
                                Employer
                            @else
                                Employee
                            @endif
                        </td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-accent" title="edit">
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
