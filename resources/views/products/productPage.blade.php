@extends('base')
@section('main')

<div id="popup" class="fixed transition hidden h-[100%] w-[100%] bg-[#00000080] left-0 top-0">
    <div class="w-[25rem] rounded-xl mt-[5rem] p-4 mx-auto bg-white opacity-100">
        <div class="ml-auto flex justify-end">
            <img id="cross" class="hover:bg-gray-300 rounded-full transition cursor-pointer" src="{{ asset('images/cross.png') }}">
        </div>
        <div class="flex justify-center">
            <img class="rounded-full p-4 bg-[#f4f1f2] h-[3.5rem]" src="{{ asset('images/check_mark.png') }}">
        </div>
        <p class="mx-auto font-bold text-center text-2xl w-2/3 mt-[1rem]">
            The product has been added to the cart.
        </p>
        <div class="text-center flex flex-col mt-[1rem]">
            <p>{{ $product->name }}</p>
            <p>{{ $product->price }} USD</p>
            <div class="w-1/2 mx-auto mt-[1rem] flex">
                <img class="mx-auto" src="{{ asset($product->image_url) }}">
            </div>
        </div>
        <a href="/cart"><button class="hover:bg-[#e0872d] transition h-[2.5rem] w-[80%] mx-auto mt-[2rem] bg-[#df9a55] py-2 justify-center text-white text-xl font-bold rounded-lg flex items-center">Cart</button></a>
        <p id="closePopup" class="font-medium text-center mx-auto w-1/2 text-xl mt-[1rem] mb-[2rem] hover:underline cursor-pointer">Continue shopping</p>
    </div>
</div>
<div class="flex min-h-[30rem] mt-[50px]">
    <div class="flex-1">
        <img class="h-full mx-auto object-contain flex justify-center" src="{{ asset($product->image_url) }}">
    </div>
    <div class="mt-[3rem] flex-1 ml-[4rem]">
        <p class="font-medium text-xl">{{ $product->name }}</p>
        <hr class="border border-[#dddfdf]">
        <p class="font-medium text-lg mt-[0.5rem]">Price: <span class="text-red-500">${{ $product->price }}</span></p>
        <div class="mt-3">
            <p class="text-lg font-medium">About this item</p>
            <p class="font-medium mt-2">{!! $product->description !!}</p>
        </div>
        <div class="flex justify-center mt-5">
            <button data-price="{{ $product->price }}" data-image_url="{{$product->image_url}}" data-id="{{$product->id}}" data-name="{{$product->name}}" id="add_to_cart_button" class="font-medium text-lg bg-[#df9a55] hover:bg-[#e0872d] transition w-[12rem] py-2 rounded-2xl text-white">Add to Cart</button>
        </div>
    </div>
</div>
<script type="module" src="{{ url('js/products/productPage.js') }}"></script>
@endsection
