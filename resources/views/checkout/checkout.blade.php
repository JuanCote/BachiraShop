@extends('base')
@section('main')

<div class="flex mt-[50px]">
    <div class="w-[70%]">
        <div class="flex items-center">
            <h1 class="font-bold text-4xl">Delivery details</h1>
        </div>
        <div class="flex mt-[2rem] items-center">
            <img class="h-[1rem]" src="{{asset('images/tag.png')}}">
            <p class='ml-[0.5rem]'>Free delivery for orders over 500 USD at full cost</p>
        </div>
        <div class="w-[80%] mt-[2rem]">
            <form id="form" action="{{ route('createOrder') }}" method="POST">
                @csrf
                <div class="flex justify-between gap-[5%]">
                    <div class="w-full flex flex-col">
                        <div class="flex justify-between">
                            <label class="text-sm">Fitsname</label>
                            <p id="firstname-error" class="hidden text-sm text-red-500"></p>
                        </div>
                        <div class="flex items-center relative">
                            <input name="firstname" id="firstname" value="{{ $user->name }}" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                            <img id="firstname-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                        </div>
                    </div>
                    <div class="w-full flex flex-col">
                        <div class="flex justify-between">
                            <label class="text-sm">Surname</label>
                            <p id="surname-error" class="hidden text-sm text-red-500"></p>
                        </div>
                        <div class="flex items-center relative">
                            <input name="surname" id="surname" value="{{ $user->surname }}" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                            <img id="surname-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-[1rem] gap-[5%]">
                    <div class="w-full flex flex-col">
                        <div class="flex justify-between">
                            <label class="text-sm">Street</label>
                            <p id="street-error" class="hidden text-sm text-red-500">This is a required field</p>
                        </div>
                        <div class="flex items-center relative">
                            <input name="street" id="street" value="{{ $user->street }}" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                            <img id="street-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                        </div>
                    </div>
                    <div class="w-full flex flex-col">
                        <div class="flex justify-between">
                            <label class="text-sm">House</label>
                            <p id="house-error" class="hidden text-sm text-red-500">This is a required field</p>
                        </div>
                        <div class="flex items-center relative">
                            <input name="house" id="house" value="{{ $user->house }}" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                            <img id="house-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-[1rem] gap-[5%]">
                    <div class="w-full flex flex-col">
                        <div class="flex justify-between">
                            <label class="text-sm">Postal Code</label>
                            <p id="postal-error" class="hidden text-sm text-red-500"></p>
                        </div>
                        <div class="flex items-center relative">
                            <input name="postal" id="postal" value="{{ $user->postal }}" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                            <img id="postal-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                        </div>
                    </div>
                    <div class="w-full flex flex-col">
                        <div class="flex justify-between">
                            <label class="text-sm">City</label>
                            <p id="city-error" class="hidden text-sm text-red-500">This is a required field</p>
                        </div>
                        <div class="flex items-center relative">
                            <input name="city" id="city" value="{{ $user->city }}" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                            <img id="city-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                        </div>
                    </div>
                </div>
                <div class="flex mt-[1rem] flex-col w-[47.5%]">
                    <div class="flex justify-between w-[207px]">
                        <label class="text-sm">Phone number</label>
                        <p id="phone-error" class="hidden text-xs text-red-500">Incorrect number</p>
                    </div>
                    <div class="flex items-center relative">
                        <input name="phone_number" id="phone-input" placeholder="Phone" class="h-[2.5rem] outline-none border px-3 border-[#c5c5c5]">
                        <img id="phone-error-check" class="hidden absolute h-[1.5rem] left-[71%]" src="{{ asset('images/check_mark_address.png') }}">
                    </div>
                    <input type="hidden" id="productsData" name="productsData">
                </div>
                <div class="w-[60%] mx-auto">
                    <button type="submit" class="mt-[1rem] w-full bg-[#df9a55] hover:bg-[#e0872d] transition py-3">
                        <p class="text-center text-white text-lg font-bold">Complete Order</p>
                        <div class="flex font-medium text-white text-sm justify-center">
                            <p>Total purchase amount</p>
                            <p id="total-purchase-2" class="ml-1">520 USD</p>
                        </div>
                    </button>
                </div>
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
        <button type="submit" class="mt-[1rem] bg-[#df9a55] hover:bg-[#e0872d] transition py-3 text-center w-full text-white text-lg font-bold">Complete Order</button>
        <div class="mt-[2rem]">
            <div class="flex items-center">
                <p class="font-medium text-xl">Your order</p>
                <div id="product_count" class="ml-[1rem] bg-white h-[45px] px-4 items-center flex"></div>
                <img id="down_products" class="h-[2rem] transition ml-auto cursor-pointer" src="{{ asset('/images/down.png') }}">
            </div>
            <div id="order_container">

            </div>
        </div>
    </div>
</form>
    <script type="module" src="{{ url('js/checkout/checkout.js') }}"></script>


@endsection
