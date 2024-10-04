@extends('dashboard.layout.admin')
@section('content')
    <form action="{{url('admin/payments/search')}}" method="post" class="flex items-center mt-3">
        @csrf
        <input type="text" placeholder="Search here" name="paymentsearch" class="input input-bordered w-full me-3"/>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="flex justify-between items-center mb-4">
        <h3>Payments</h3>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Received At</th>
                    <th>Image</th>
                    <th>Transaction Number</th>
                    <th></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $index=>$payment)
                    <tr>
                        <th>{{ $index+1 }}</th>
                        <td>{{$user->where('id',$payment->user_id)->first()->name}}</td>
                        <td>{{$payment->created_at->diffForHumans()}}</td>
                        <td>
                            @switch($payment->image)
                                @case(null)
                                <p>Image not sent</p>
                                @break
                                @case(!null)
                                    <img src="{{asset('storage/images'.$payment->image)}}" alt="">
                                @break
                            @endswitch
                        </td>
                        <td>{{ $payment->transaction_number }}</td>
                        <td>
                            @switch($payment->status)
                                @case('pending')
                                    <div class="badge badge-warning gap-2">
                                        pending
                                    </div>
                                @break
                                @case('approve')
                                    <div class="badge badge-success gap-2 text-white">
                                        approve
                                    </div>
                                @break
                            @endswitch
                        </td>
                        <td>
                            @switch($payment->status)
                                @case('pending')
                                    <form action="{{url('admin/payments/'.$payment->id.'/update')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                    </form>
                                    @break
                                @case('approve')
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 me-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                    </svg>
                                <p>Payment Approved</p>
                                </div>
                            @endswitch

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
