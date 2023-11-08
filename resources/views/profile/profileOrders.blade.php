@extends('profile.profileBase')
@section('content')

<div class="w-full relative">
    <h2 class="text-[#5c646c]">My account > My orders</h2>
    <h3 class="text-2xl mt-[1rem]">My orders</h3>
    <div class="min-h-[19rem]">
        @if (!$orders->isNotEmpty())
            <div class="flex flex-col justify-center items-center mt-[5rem] mb-[5rem]">
                <img class="h-[4rem] w-[4rem]" src="{{ asset('images/empty_box.png') }}">
                <p class="font-bold mt-[0.5rem]">No orders</p>
                <p class="">There are no orders</p>
                <a class="mt-[1rem]" href="/category/Electronic?order=desc&sort=price"><p class="underline font-medium text-sm">Find something for yourself</p></a>
            </div>
        @else
        <div class="mt-[1rem]">
            <div class="flex font-bold justify-between">
                <p class="w-[100px]">ID</p>
                <p class="w-[120px]">Status</p>
                <p class="w-[150px]">Date</p>
                <p class="w-[120px]">Customer</p>
                <p class="w-[170px]">Phone</p>
                <p class="w-[50px] text-right">Total</p>
            </div>
            @foreach ($orders as $order)
            <div class="flex justify-between font-medium mt-[1rem] border-t-2 py-4">
                <p class="w-[100px]">Order #{{ $order->id }}</p>
                <p class="w-[120px]">Processing</p>
                <p class="w-[150px]">{{ $order->created_at }}</p>
                <p class="w-[120px]">{{ $order->firstname }}</p>
                <p class="w-[170px]">{{ $order->phone_number }}</p>
                <p class="w-[50px] text-right">{{ $order->total_price }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection
