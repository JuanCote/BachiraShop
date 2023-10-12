@extends('base')
@section('main')

<div class="flex mt-[50px]">
    <div class="flex flex-col p-2 w-[30%]">
        <h2 class="font-bold">My account</h2>
        <ul class="ml-[1rem] mt-[1rem] w-[8rem]">
            <a href="/profile/orders"><li class="hover:underline cursor-pointer">My orders</li></a>
            <a href="/profile/address"><li class="hover:underline cursor-pointer">Delivery address</li></a>
            <li id="logout_button" class="hover:underline cursor-pointer">Logout</li>
        </ul>
    </div>
    <div class="w-[70%]">
        @yield('content')
    </div>
</div>
<div id="logout-popup" class="fixed hidden transition h-[100%] w-[100%] bg-[#00000080] left-0 top-0">
    <div class="w-[18rem] rounded-xl mt-[18rem] pt-4 mx-auto bg-white opacity-100">
        <div class="text-center">
            Are you sure you want to sign out?
        </div>
        <div class="flex border-t-2 mt-[1rem]">
            <div id="cancel-logoutpopul" class="flex-1 text-center font-bold py-4 border-r-2 cursor-pointer">Cancel</div>
            <a class="flex-1" href="/signout"><div class="text-center font-bold py-4 cursor-pointer">Logout</div></a>
        </div>
    </div>
</div>

<script type="module" src="{{ url('js/profile/profileBase.js') }}"></script>

@endsection
