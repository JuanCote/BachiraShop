@extends('base')
@section('main')
<div class="flex mt-[122px] h-[600px]">
    <div>
        <p class="text-[54px] font-bold tracking-[0.5px]">Best Place to Buy<br>
            <span class="text-[#3C9379]">Everything.</span></p>
        <p class="mt-[32px] text-sm">At Bachira, you can shop for all your favorite beauty brands, clothes,<br>
            household products and more at a single place.</p>
        <a href="/category/Electronic?order=desc&sort=price"><button class="py-[12px] px-[22px] bg-[#3C9379] text-white rounded-[8px] mt-[32px] transition hover:-translate-y-1 hover:bg-[#57a18b]">Shopping Now</button></a>
    </div>
    <div class="">
        <img class="absolute h-[35rem]" src="{{url('/images/landing-woman.png')}}" alt="langing woman">
    </div>
</div>
<div class="mt-[75px] text-center font-bold text-[32px]">
    We Collaborate With 250++ Leading Top<br>
E Commerce and Brands
</div>
<div class="flex mt-[60px] justify-between items-center">
    <img class="h-[45px]" src="{{url('/images/logo1.png')}}" alt="tokopedia">
    <img class="h-[26px]" src="{{url('/images/logo2.png')}}" alt="balenciaga">
    <img class="h-[46px]" src="{{url('/images/logo3.png')}}" alt="adidas">
    <img class="h-[32px]" src="{{url('/images/logo4.png')}}" alt="gucci">
    <img  src="{{url('/images/logo5.png')}}" alt="bikalapak">
</div>
<div class="mt-[30px] w-[1200px] mx-auto">
    <div class="mt-[123px] text-[32px] font-bold">
        Browse Categories of<br>
    The Store
    </div>
    <div class="flex mt-[30px]">

        <div class="">
            <a href="/category/Clothing?order=desc&sort=price"><div class="relative overflow-hidden rounded-[30px]">
                <div class="absolute left-[70%] z-10 text-white top-[10%]">
                    <h2 class="text-xl font-bold ">Fashion</h2>
                    <p class=>30,000 items</p>
                </div>
                <img class="-z-10 hover:scale-110 transition duration-300 ease-out" src="{{url('/images/landing-cloth1.png')}}">
            </div></a>
            <a href="/category/Skincare?order=desc&sort=price"><div class="relative mt-[26px] rounded-[30px] overflow-hidden">
                <div class="absolute z-10  left-[70%] text-white top-[10%]">
                    <h2 class="text-xl font-bold">Skincare</h2>
                    <p class=>2,000 items</p>
                </div>
                <img class="-z-10 hover:scale-110  transition duration-300 ease-out" src="{{url('/images/landing-cloth2.png')}}">
            </div></a>
        </div>
        <div class="flex ml-[26px]">
            <a href="/category/Shoes?order=desc"><div class="relative rounded-[30px] overflow-hidden">
                <div class="absolute z-10  left-[70%] text-white top-[10%]">
                    <h2 class="text-xl font-bold">Shoes</h2>
                    <p class=>2,000 items</p>
                </div>
                <img class="-z-10 hover:scale-110  transition duration-300 ease-out" src="{{url('/images/landing-cloth3.png')}}">
            </div></a>
            <a href="/category/Electronic?order=desc&sort=price"><div class="relative ml-[26px] rounded-[30px] overflow-hidden">
                <div class="absolute  z-10 left-[70%] text-white top-[10%]">
                    <h2 class="text-xl font-bold">Electronic</h2>
                    <p class=>2,000 items</p>
                </div>
                <img class="-z-10 hover:scale-110  transition duration-300 ease-out" src="{{url('/images/landing-cloth4.png')}}">
            </div></a>
        </div>
    </div>
</div>
<div class="mt-[100px]">
    <div class="text-center text-[32px] font-bold">
        Why Choose Ba<span class="text-[#3C9379]">chira</span>?
    </div>
    <div class="flex justify-center mt-[60px]">
        <div>
            <img class="mx-auto " src="{{url('/images/delivery1.png')}}">
            <p class="text-center text-xl font-bold">Free Delivery</p>
            <p class="text-center w-[270px]">Lorem ipsum dolor sit amet, consectetu
                adipiscing elit, sed do eiusmod tempor</p>
        </div>
        <div>
            <img class="mx-auto" src="{{url('/images/delivery2.png')}}">
            <p class="text-center text-xl font-bold">Trusted Platform</p>
            <p class="text-center w-[270px]">Lorem ipsum dolor sit amet, consectetu
                adipiscing elit, sed do eiusmod tempor</p>
        </div>
        <div>
            <img class="mx-auto" src="{{url('/images/delivery3.png')}}">
            <p class="text-center text-xl font-bold">Here for you</p>
            <p class="text-center w-[270px]">Lorem ipsum dolor sit amet, consectetu
                adipiscing elit, sed do eiusmod tempor</p>
        </div>
    </div>
</div>
<div class="mt-[100px] w-[1210px] mx-auto">
    <div class="font-bold text-[32px]">
        Popular Products From<br>
All Brands
    </div>
    <div class="flex mt-[20px] gap-[30px]">
        <div class="">
            <a href="/product/1"><div class="rounded-[30px] overflow-hidden">
                <img src="{{url('/images/product1.png')}}" class=" hover:scale-110 transition duration-300 ease-out">
            </div></a>
            <p class="mt-[15px] text-xl font-medium"><a href="/product/1">Nike Air Force</a></p>
            <p class="mt-[2px]">2999.00 USD</p>
        </div>
        <div class="flex flex-col">
            <a href="/product/33"><div class="rounded-[30px] overflow-hidden">
                <img src="{{url('/images/product2.png')}}" class=" hover:scale-110 transition duration-300 ease-out">
            </div></a>
            <p class="mt-[15px] text-xl font-medium"><a href="/product/33">White Sweter</a></p>
            <p class="mt-[2px]">44.25 USD</p>
        </div>
        <div>
            <a href="/product/34"><div class="rounded-[30px] overflow-hidden">
                <img src="{{url('/images/product3.png')}}" class=" hover:scale-110 transition duration-300 ease-out">
            </div></a>
            <p class="mt-[15px] text-xl font-medium"><a href="/product/34">Smartwatch</a></p>
            <p class="mt-[2px]">350.00</p>
        </div>
        <div>
            <a href="/product/36"><div class="rounded-[30px] overflow-hidden">
                <img src="{{url('/images/product4.png')}}" class=" hover:scale-110 transition duration-300 ease-out">
            </div></a>
            <p class="mt-[15px] text-xl font-medium"><a href="/product/36">Apple Airpods</a></p>
            <p class="mt-[2px]">200.00</p>
        </div>
    </div>
</div>
@endsection
