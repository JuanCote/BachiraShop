<div class="flex py-[42px] justify-between">
    <div class="text-4xl font-bold">
        <a href='index'>Ba<span class="text-[#3C9379]">chira</span></a>
    </div>
    <ul class="flex items-center gap-6 font-medium">
        <a href="index"><li>Home</li></a>
        <li>Products</li>
        <li>Categories</li>
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
<div class="h-[20rem] bg-[#f1f2f4] flex gap-[10rem] text-lg px-10 py-6">
    @foreach ($categories as $category)
        <div>
            <div class="font-bold">{{ $category->name }}</div>
        </div>
    @endforeach
</div>
