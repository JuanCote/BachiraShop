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
</div>
<div id="categories-block" class="z-10 absolute overflow-hidden rounded-[1rem] transition-max-height duration-300 ease-out max-h-0 bg-[#f1f2f4] flex gap-[10rem] text-xl px-10">
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
