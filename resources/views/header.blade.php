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
        <div class="flex items-center">
            <a href="/signout"><button class="hover:bg-[#389c7e] px-[18px] py-[8px] bg-[#3C9379] text-white font-medium rounded-[8px]">Logout</button></a>
        </div>
        @else
            <div>
                <a href="/login"><button class="font-medium mr-[20px]">Login</button></a>
                <a href="/registration"><button class="hover:bg-[#389c7e] px-[18px] py-[8px] bg-[#3C9379] text-white font-medium rounded-[8px]">Register</button></a>
            </div>
        @endauth
        <div id="cart" class="max-w-[35px] transition">
            <a href="/cart"><img src="{{asset('images/cart.svg')}}"></a>
        </div>
    </div>
</div>
<div id="cart_menu" class="opacity-0 -z-30 transition-all translate-x-[10rem] absolute w-[25rem] rounded-xl overflow-hidden bg-[#f1f2f4] right-0">
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
