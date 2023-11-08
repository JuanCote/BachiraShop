<div class="flex py-[42px] justify-between">
    <div class="text-4xl font-bold">
        <a href='{{ route('index') }}'>Ba<span class="text-[#3C9379]">chira</span></a>
    </div>
    <ul class="flex items-center gap-6 font-medium">
        <a href="/"><li>Home</li></a>
        <li>Products</li>
        <li class="hover:cursor-pointer" id="categories">Categories</li>
        <li>Brands</li>
        <li>Pricing</li>
    </ul>
    <div class="flex gap-10 items-center">
        @auth
        <div id="profile_icon" class="flex items-center flex-col">
            <a href="/profile/orders"><img class="" src="{{ asset('images/user.png') }}"></a>
            <a href="/profile/orders"><p class="font-medium">Account</p></a>
        </div>
        @else
            <div>
                <a href="/login"><button class="font-medium mr-[20px]">Login</button></a>
                <a href="/registration"><button class="hover:bg-[#389c7e] px-[18px] py-[8px] bg-[#3C9379] text-white font-medium rounded-[8px]">Register</button></a>
            </div>
        @endauth
        <div id="cart" class="max-w-[35px] transition relative">
            <p id="cart_count" class="absolute left-[45%] -top-5 text-xl font-medium -translate-x-1/2">5</p>
            <a href="/cart"><img src="{{asset('images/cart.svg')}}"></a>
        </div>
    </div>
</div>
@if (Session::get('message'))
    <div id="notification" class="flex absolute z-20 left-[50%] rounded-xl -translate-x-[50%] transition opacity-0 bg-[#dff6dd] items-center px-3 gap-3 w-[629.19px] h-[3rem]">
        <img class="h-[2rem]" src="{{asset('images/check_mark_address.png')}}">
        {{ Session::get('message') }}
    </div>
@endif
<div id="cart_menu" class="opacity-0 max-h-[800px] overflow-auto -z-30 transition-all translate-x-[10rem] absolute w-[25rem] rounded-xl bg-[#f1f2f4] right-0">
    <div id="cart_block" class="flex p-4 flex-col gap-4">

    </div>
    <div class="p-4 bg-[#e6ecf2]">
        <div class="w-[80%] mx-auto flex justify-between">
            <p class="font-bold text-lg">Total cost</p>
            <p id="total_price" class="font-bold"></p>
        </div>
        <a href='/cart'><button class="hover:bg-[#e0872d] transition h-[2.5rem] w-[80%] mx-auto mt-[1rem] bg-[#df9a55] py-2 justify-center text-white text-xl font-bold rounded-lg flex items-center">Cart</button></a>
    </div>
</div>
<div id="categories-block" class="z-10 absolute overflow-hidden rounded-[1rem] transition-max-height duration-300 max-h-0 ease-out bg-[#f1f2f4] flex gap-[10rem] text-xl px-10">
    @foreach ($categories as $category)
        @if ($category->parent_id == null)
            <div>
                <a href="/category/{{ $category->name }}?order=desc&sort=price"><div class="font-bold transition ease-in hover:scale-[1.05]">{{ $category->name }}</div></a>
                @foreach ($category->subcategories as $sub)
                    <div class="text-lg transition ease-in hover:scale-[1.05]">
                        <a href="/category/{{ $sub->name }}?order=desc&sort=price"><span class="">{{ $sub->name }}</span></a>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
</div>
@auth
<div id="profile_menu" class="w-[300px] absolute opacity-0 transition right-0 -z-30 translate-x-[10rem]">
    <div class="bg-[#f1f2f4] text-lg font-bold h-[5rem] px-8 items-center flex">
        @if ($user->name)
        {{$user->name}}
        @else
        {{$user->email}}
        @endif
    </div>
    <div class="border-x-2">
        <a href="/profile/orders"><div class="flex hover:bg-gray-200 transition bg-white gap-2 items-center border-b-2 py-4 px-8">
            <img class="h-[1.5rem]" src="{{ asset('images/empty_box.png') }}">
            <p class="font-medium text-md">My orders</p>
        </div></a>
        <a href="/profile/address"><div class="flex bg-white hover:bg-gray-200 transition gap-2 items-center border-b-2 py-4 px-8">
            <img class="h-[1.5rem]" src="{{ asset('images/location.png') }}">
            <p class="font-medium text-md">My Address</p>
        </div></a>
        <a href="/profile/orders"><div class="flex hover:bg-gray-200 transition bg-white gap-2 items-center py-4 px-8">
            <img class="h-[1.5rem] ml-[0.3rem]" src="{{ asset('images/logout.png') }}">
            <p class="font-medium text-md">Logout</p>
        </div></a>
    </div>
    <div class="bg-[#3c9379] h-[5rem] py-6 flex text-white gap-2 px-8">
        <p>Free delivery from 500 USD</p>
        <img class="h-[1.5rem]" src="{{asset('images/truck.png')}}">
    </div>
</div>
@endauth

