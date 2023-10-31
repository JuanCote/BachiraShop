@extends('base')
@section('main')

<div class="flex mt-[50px]">
    <div class="w-[70%]">
        <div class="flex items-center">
            <h1 class="font-bold text-4xl">Cart</h1>
            <div id="product_count" class="ml-[1rem] bg-[#f3f3f5] h-[45px] px-4 items-center flex"></div>
        </div>
        <div class="flex mt-[2rem] items-center">
            <img class="h-[1rem]" src="{{asset('images/tag.png')}}">
            <p class='ml-[0.5rem]'>Free delivery for orders over 500 USD at full cost</p>
        </div>
        <div id="cart_container">
        </div>
    </div>
    <div class="flex-2 w-[30%] bg-[#f2f2f2] py-[5.1rem] px-[3rem]">
        <div class="flex justify-between">
            <p>Total Cost</p>
            <p id="total-cost">500 USD</p>
        </div>
        <div class="flex justify-between mt-[1rem]">
            <p>Delivery</p>
            <p id="delivery">From 20 USD</p>
        </div>
        <hr class="mt-[1rem]">
        <div class="flex justify-between mt-[1rem]">
            <p>Total purchase amount</p>
            <p id="total-purchase" class="font-medium">520 USD</p>
        </div>
        <hr class="mt-[1rem]">
        @auth
        <a id="proceedButton-a" href="/checkout"><button id="proceedButton" class="mt-[1rem] bg-[#df9a55] hover:bg-[#e0872d] transition py-3 text-center w-full text-white text-lg font-bold">Proceed to checkout</button></a>
        @else
        <a id="proceedButton-a" href="/login"><button id="proceedButton" class="mt-[1rem] bg-[#df9a55] hover:bg-[#e0872d] transition py-3 text-center w-full text-white text-lg font-bold">Proceed to checkout</button></a>
        @endauth
        <div class="mt-[2rem]">
            <div class="flex mt-[1rem] items-center gap-2">
                <img class="h-[1.5rem]" src="{{ asset('images/safety.png') }}">
                <p class="font-medium text-sm">Safe shopping at Bachira</p>
            </div>
            <div class="flex mt-[1rem] items-center gap-2">
                <img class="h-[1.5rem]" src="{{ asset('images/box.png') }}">
                <p class="font-medium text-sm">Free delivery for orders over UAH 500 at full cost</p>
            </div>
            <div class="flex mt-[1rem] items-center gap-2">
                <img class="h-[1.5rem]" src="{{ asset('images/back_arrow.png') }}">
                <p class="font-medium text-sm">30 days to return</p>
            </div>
        </div>
    </div>
</div>

<script type="module" src="{{ url('js/products/cart.js') }}"></script>

@endsection
