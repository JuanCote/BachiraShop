@extends('profile.profileBase')
@section('content')

<div class="w-full">
    <h2 class="text-[#5c646c]">My account > My orders</h2>
    <h3 class="text-2xl mt-[1rem]">My orders</h3>
    <div>
        @if (!$orders)
            <div class="flex flex-col justify-center items-center mt-[5rem] mb-[5rem]">
                <img class="h-[4rem] w-[4rem]" src="{{ asset('images/empty_box.png') }}">
                <p class="font-bold mt-[0.5rem]">No orders</p>
                <p class="">There are no orders</p>
                <a class="mt-[1rem]" href="/category/Electronic?order=desc&sort=price"><p class="underline font-medium text-sm">Find something for yourself</p></a>
            </div>
        @endif
    </div>
</div>

@endsection
