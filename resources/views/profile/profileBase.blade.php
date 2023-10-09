@extends('base')
@section('main')

<div class="flex mt-[50px]">
    <div class="flex flex-col p-2 w-[30%]">
        <h2 class="font-bold">My account</h2>
        <ul class="ml-[1rem] mt-[1rem] w-[8rem]">
            <a href="/profile/orders"><li class="hover:underline cursor-pointer">My orders</li></a>
            <li class="hover:underline cursor-pointer">Delivery address</li>
            <a href="/signout"><li class="hover:underline cursor-pointer">Logout</li></a>
        </ul>
    </div>
    <div class="w-[70%]">
        @yield('content')
    </div>
</div>

@endsection
