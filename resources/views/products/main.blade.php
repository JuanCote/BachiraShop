@extends('products.base')
@section('content')

<div class="flex mt-[6rem] justify-between">
    <div class="flex flex-col">
        @if ($parent_category->name == $selected_category->name)
        <h1 class="font-bold underline text-blue-500 text-2xl"><a href="/category/{{ $parent_category->name }}"><span class="">{{ $parent_category->name }}</span></a></h1>
        @else
        <div class="font-bold text-2xl">
            <a href="/category/{{ $parent_category->name }}" class="">
                <span class="">{{ $parent_category->name }}</span>
            </a>
        </div>
        @endif
        <div class="mt-2 flex gap-4">
            @foreach ($subcategories as $subcategory)
                @if ($selected_category->name == $subcategory['name'])
                <a href="/category/{{ $subcategory['name'] }}"><div class="mb-1 text-blue-500 underline text-lg font-medium hover:scale-110 transition">{{ $subcategory['name'] }}</div></a>
                @else
                <a href="/category/{{ $subcategory['name'] }}"><div class="mb-1 text-lg font-medium hover:scale-110 transition">{{ $subcategory['name'] }}</div></a>

                @endif
            @endforeach
        </div>
        <div class="font-medium text-lg">
            {{ $products_count }} results
        </div>
    </div>
    <div>
        <div class="w-[162px]">
            <div id="sort_button" class="flex items-center px-2 text-xs hover:cursor-pointer h-[20px] text-[#0F1111] shadow-md bg-[#f0f2f2] rounded-xl">
                Sort by: Price: Low to High
            </div>
            <div id="sort_panel" class="z-10 transition-max-height max-h-0 duration-300 overflow-hidden absolute rounded-md w-[162px] bg-[#f7f7f7]">
                <ul class="px-2">
                    <li>Price: Low to High</li>
                    <li>Price: High to Low</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="mt-[2rem] grid grid-cols-4 gap-4">
    @foreach ($products as $product)
    <div class="">
        <a href=""><div class="overflow-hidden">
            <img src="{{asset($product->image_url)}}" class="h-[23rem] w-full object-contain hover:scale-110 transition duration-300 ease-out">
        </div></a>
        <p class="mt-[15px] text-xl font-medium">{{ $product->name }}</p>
        <p class="mt-[2px]">{{ $product->price }}</p>
    </div>
    @endforeach
</div>

@endsection
