@extends('profile.profileBase')
@section('content')


<div class="w-[70%] relative mb-[70px]">
    @if ($message)
    <div id="notification" class="flex absolute z-20 mx-auto top-[-3rem] transition opacity-0 bg-[#dff6dd] items-center px-3 gap-3 w-[629.19px] h-[3rem]">
        <img class="h-[2rem]" src="{{asset('images/check_mark_address.png')}}">
        {{$message}}
    </div>
    @endif
    <form id="form" action="{{ route('profile.editAddress') }}" method="POST">
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
        </div>
        <hr class="mt-[1rem]">
        <div class="flex justify-end">
            <button type="submit" class="w-[30%] h-[2.5rem] mt-[1rem] bg-[#29abe2] hover:bg-[#8f4fb0] transition text-white">Save changes</button>
        </div>
    </form>
</div>

<script type="module" src="{{ url('js/profile/address.js') }}"></script>

@endsection
