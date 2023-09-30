@extends('base')
@section('main')

<div class="flex mt-[50px]">
    <div class="">
        <div class="flex items-center">
            <h1 class="font-bold text-4xl">Cart</h1>
            <div class="ml-[1rem] bg-[#f3f3f5] h-[45px] px-4 items-center flex">4 products</div>
        </div>
        <div class="flex mt-[2rem] items-center">
            <img class="h-[1rem]" src="{{asset('images/tag.png')}}">
            <p class='ml-[0.5rem]'>Free delivery for orders over 500 USD at full cost</p>
        </div>
        <div>
            <div class="flex mt-[2rem]">
                <div class="w-[20%]">
                    <a href="/product/"><img class="" src="{{ asset('images/products/81HGN7I8q3L._AC_UY575_.jpg') }}"></a>
                </div>
                <div class="flex flex-col ml-6">
                    <div>
                        <a href="/product/"><h2 class="font-medium text-lg">Пижама</h2></a>
                        <p class="mt-3">Cost: 1000 USD</p>
                    </div>
                    <div class="flex mt-auto justify-between">
                        <button class="rounded-full w-[2rem] flex items-center justify-center pb-3 h-[2rem] text-5xl bg-[#f1f2f4]">-</button>
                        <p></p>
                        <button class="rounded-full w-[2rem] flex items-center justify-center pb-1 h-[2rem] text-3xl bg-[#f1f2f4]">+</button>
                    </div>
                </div>
                <div class="ml-auto">
                    <div class="flex gap-1 hover:bg-[#f1f2f4] hover:cursor-pointer p-3 rounded-xl transition">
                        <div class="">
                            <img class="h-[1.5rem]" src="{{ asset('images/trash.png') }}">
                        </div>
                        <p class="font-medium">Remove</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="{{ url('js/products/productPage.js') }}"></script>

@endsection
