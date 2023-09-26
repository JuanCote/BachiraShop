@extends('products.base')
@section('content')

<div class="flex min-h-[30rem] mt-[50px]">
    <div class="flex-1">
        <img src="{{ asset($product->image_url) }}">
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
<script type="module" src="{{ url('js/products/productPage.js') }}"></script>
@endsection
