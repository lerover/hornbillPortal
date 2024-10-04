@extends('employer.layout.master')
@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3>Payments</h3>
    </div>

    @if(session()->has('success'))
        <div class="w-1/3 h-16 bg-green-600 text-white rounded-xl flex justify-between items-center p-2 ps-5" id="alert">
            <h1 class="text-lg">{{session()->get('success')}}</h1>
            <button class="btn btn-ghost" onclick="document.querySelector('#alert').addEventListener('click',function(){this.style.display='none'})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <div class="flex justify-center">

{{--        purchase card--}}
        @if(isset($payment->user_id))
            @if($payment->user_id === $employer->id)
                @if($payment->status === 'approve')
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md w-full" role="alert">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>
                    <div class="text-center space-y-5">
                        <p class="font-bold">Congratulations {{$employer->name}}</p>
                        <p class="text-sm">You've purchased lifetime plan successfully!!</p>
                        <p>You can post now.</p>
                        <img src="{{asset('storage/images/con.png')}}" alt="" class="w-56 block rounded-full m-auto">
                    </div>
                </div>
            </div>
                @else
                    <div class="flex flex-col items-center space-y-4">
                        <p class="bg-amber-400 p-4 rounded-xl font-bold">We're reviewing your payment. Please wait for a moment. Soon you can be able to post.</p>
                        <p class="bg-accent p-3  rounded-xl font-bold">Really thank you for your patience</p>
                        <img src="{{asset('storage/images/wait.png')}}" alt="" class="w-[500px]">
                    </div>
                @endif
            @endif
        @else
            <div class=" bg-base-100 shadow-xl flex">
                <div class="card-body w-1/2 grid space-y-10">
                    <div class="w-full rounded-lg bg-blue-800 p-3 text-white">
                        <h3 class="text-xl">Lifetime Plan</h3>
                        <div class="flex items-center ">
                            <div class="border-b-2 w-1/3"></div>
                            <p class="text-center px-2 text-4xl">100000 MMK</p>
                            <div class="border-b-2 w-1/3"></div>
                        </div>
                    </div>

                    <div class="text-center grid w-1/2 justify-self-center focus:border-2 rounded-xl border-blue-800" tabindex="0">
                        <h3>Transfer to</h3>
                        <img src="{{asset('storage/images/kpay.png')}}" alt="kpayicon" class="w-20 justify-self-center">
                        <p>(Job-Hydro : 0941008976)</p>
                        <small class="text-left">Transfer to above number to purchase lifetime plan, then <b>take a screenshot of your payslip</b> or <b>copy Transaction_Number</b> to submit your purchase.</small>
                    </div>

                    <div class="w-full rounded-2xl bg-warning p-2 text-black">
                        <p>If there something inconvenience with your payment, email to us <b><a href="mailto:lerover115573@gmail.com" class='underline'>lerover115573@gmail.com</a></b>. We will reply as fast as possible in <b>24 hours</b></p>
                    </div>
                </div>
                <div class="card-body my-auto">
                    <div class="grid text-center">
                        <h2 class="text-2xl font-bold">Lifetime Plan For Your Company!!</h2>
                        <p>To Be Able to post lifetime, purchase premium plan now!!</p>


                        <div class="card-actions justify-self-center mt-4">
                            <!-- You can open the modal using ID.showModal() method -->
                            <button class="btn btn-primary" onclick="my_modal_3.showModal()">Purchase Now</button>
                            <dialog id="my_modal_3" class="modal">
                                <div class="modal-box space-y-4">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="text-2xl font-bold">Payment</h3>
                                    <h3 class="text-md font-bold bg-blue-800 text-white p-3 rounded-xl">
                                        "Unlock the ability to post jobs and hire top developers by making your purchase today!"</h3>
                                    <form action="{{route('employer.payment.store')}}" method="POST" enctype="multipart/form-data" class="space-y-7">
                                        @csrf
                                        <label for="">Screenshot</label>
                                        <div>
                                            <input type="file" name="image" id="image" class="hidden">
                                            <label for="image" class="w-full h-full border-2 border-dashed flex flex-col border-gray-400 justify-center items-center rounded-2xl py-10 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                                </svg>

                                                <p class="text-gray-500 text-xs">Upload your bank slip here</p>
                                            </label>
                                        </div>

                                        <div class="flex items-center ">
                                            <div class="border-b-2 w-2/3"></div>
                                            <p class="text-center px-2">Or</p>
                                            <div class="border-b-2 w-2/3"></div>
                                        </div>

                                        <label class="input input-bordered flex items-center gap-2">
                                            Transaction_Number
                                            <input type="text" name="transaction_number" class="grow" placeholder="Enter here" />
                                        </label>
                                        <button type="submit" class="btn btn-primary btn-sm">Purchase</button>
                                    </form>
                                </div>
                            </dialog>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection
