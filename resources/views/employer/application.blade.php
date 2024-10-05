@extends('employer.layout.master')
@section('content')
    @if(session()->has('success'))
        <div class="w-1/3 h-14 bg-green-600 text-white rounded-xl flex justify-between items-center p-2 ps-5" id="alert">
            <h1 class="text-md">{{session()->get('success')}}</h1>
            <button class="btn btn-ghost" onclick="document.querySelector('#alert').addEventListener('click',function(){this.style.display='none'})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @elseif(session()->has('warning'))
        <div class="flex" id="postWarnAlert">
            <div role="alert" class="alert alert-warning mb-5 w-11/12" >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Warning: {{session()->get('warning')}}</span>

                <button type="button" class="btn btn-warning btn-sm" onclick="document.querySelector('#postWarnAlert').style.display='none'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
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
                        <th></th>
                        <th>{{$application->name}}</th>
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
                            @if($application->status === '0')
                            <form action="{{url('/employer/application/reply/'.$application->id)}}" method="post" class="me-3">
                                @csrf
                                <input type="hidden" name="accept" value="1">
                                <input type="submit" id="1" class="btn btn-success btn-xs text-white" value="accept">
                            </form>

                            <form action="{{url('/employer/application/reply/'.$application->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="reject"  value="2">
                                <input type="submit" id="2" class="btn btn-error btn-xs text-white" value="reject">
                            </form>
                            @elseif($application->status === '1' || $application->status === '2')
                                <form action="{{url('/employer/application/'.$application->id.'/delete')}}" method="POST" class="flex">
                                    @csrf
                                    @method('DELETE')
                                    <!-- You can open the modal using ID.showModal() method -->
                                    <!-- You can open the modal using ID.showModal() method -->
                                    <a class="btn btn-primary btn-xs me-3" onclick="my_modal_3.showModal()">Interview Info</a>

                                    <button type="submit" class="btn btn-error btn-xs" onclick="alert('Are you sure you want to delete?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                                <dialog id="my_modal_3" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="text-lg font-bold">Interview Info</h3>
                                        <form action="{{url('employer/interviewinfo/'.$application->id)}}" method="post">
                                            @csrf
                                            <textarea class="textarea textarea-bordered w-full" rows="6" name="interviewinfo" placeholder="enter description"></textarea>
                                            @error('description')
                                                <p class="text-error flex font-medium"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                                    </svg>

                                                    {{$message}}</p>
                                            @enderror
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                                        </form>
                                    </div>
                                </dialog>
                            @endif
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
