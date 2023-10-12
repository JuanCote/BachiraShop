@extends('profile.profileBase')
@section('content')

<div class="w-[70%] mb-[70px]">
    <form>
        <div class="flex justify-between gap-[5%]">
            <div class="w-full flex flex-col">
                <div class="flex justify-between">
                    <label class="text-sm">Fitsname</label>
                    <p id="firstname-error" class="hidden text-sm text-red-500"></p>
                </div>
                <div class="flex items-center relative">
                    <input id="firstname" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                    <img id="firstname-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                </div>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex justify-between">
                    <label class="text-sm">Surname</label>
                    <p id="surname-error" class="hidden text-sm text-red-500"></p>
                </div>
                <div class="flex items-center relative">
                    <input id="surname" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
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
                    <input id="street" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                    <img id="street-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                </div>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex justify-between">
                    <label class="text-sm">House</label>
                    <p id="house-error" class="hidden text-sm text-red-500">This is a required field</p>
                </div>
                <div class="flex items-center relative">
                    <input id="house" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
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
                    <input id="postal" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                    <img id="postal-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                </div>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex justify-between">
                    <label class="text-sm">City</label>
                    <p id="city-error" class="hidden text-sm text-red-500">This is a required field</p>
                </div>
                <div class="flex items-center relative">
                    <input id="city" class="w-full mt-[0.3rem] h-[2.5rem] outline-none border px-3 border-[#c5c5c5]" maxlength="20" placeholder="Firstname">
                    <img id="city-error-check" class="hidden absolute h-[1.5rem] left-[101%]" src="{{ asset('images/check_mark_address.png') }}">
                </div>
            </div>
        </div>
        <div class="flex mt-[1rem] flex-col w-[47.5%]">
            <label class="text-sm">Phone number</label>
            <div class="flex items-center relative">
                <input name="phone_number" id="phone-input" placeholder="Phone" class="h-[2.5rem] outline-none border px-3 border-[#c5c5c5]">
                <p id="phone-error" class="hidden absolute left-[50%] text-sm top-[-40%] text-red-500">This is a required field</p>
                <img id="phone-error-check" class="hidden absolute h-[1.5rem] left-[71%]" src="{{ asset('images/check_mark_address.png') }}">
            </div>
        </div>

    </form>
</div>

<script type="module" src="{{ url('js/profile/address.js') }}"></script>

@endsection
