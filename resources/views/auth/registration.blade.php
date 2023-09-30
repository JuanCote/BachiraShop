@extends('base')
@section('main')
<div class="my-[12rem] mx-auto w-[20rem] overflow-hidden bg-[#3c9379] rounded-[15px]">
    <div class="flex w-[50%]">
        <a href="login"><button class="py-3 w-full text-white">Login</a>
        <button class="bg-[#fb4549] rounded-b-[15px] w-full text-white">Register</button>
    </div>
    <form action="{{ route('register.custom') }}" method="POST" class="flex flex-col">
        @csrf
        <div class="mt-6 gap-5 flex flex-col mx-auto w-[80%]">
            <div class="">
                <input name="email" id="reg-email-input" maxlength="30" placeholder="Email" class="text-[#727577] w-full font-medium px-3 h-[3rem] outline-none">
                <p class="hidden px-3 py-1 -mb-3 text-red-500" id="error-email">Please use a valid email address.</p>
                @error('email')
                <p class="px-3 py-1 -mb-3 text-red-500" id="error-email">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex relative">
                    <input name="password" id="reg-password-input" maxlength="20" type="password" placeholder="Password" class="w-full text-[#727577] font-medium px-3 h-[3rem] outline-none">
                    <img id="reg-show-password-button" class="left-[90%] z-10 top-[50%] -translate-y-[50%] h-[20px] absolute" src="{{url('/images/show-password.png')}}">
                    <img id="reg-show-password-button-show" class="opacity-0 left-[90%] top-[50%] -translate-y-[50%] h-[20px] absolute" src="{{url('/images/show-password1.png')}}">
                </div>
                <p class="hidden px-3 py-1 -mb-3 text-red-500" id="error-password">Please use a valid password.</p>
            </div>
            <div>
                <input name="phone_number" id="phone-input" placeholder="Phone" class="text-[#727577] font-medium px-3 h-[3rem] outline-none w-full">
                <p class="hidden px-3 py-1 -mb-3 text-red-500" id="error-phone">Please use a valid phone.</p>
                @error('phone_number')
                <p class="px-3 py-1 -mb-3 text-red-500" id="error-email">{{ $message }}</p>
                @enderror
            </div>


        </div>
        <button type="submit" class="my-4 px-3 py-2 w-[30%] mx-auto text-white bg-[#fb4549] rounded-[15px] transition hover:bg-[#f5676a]">Register</button>
    </form>
</div>

<script type="module" src="{{ url('js/auth/register.js') }}"></script>
@endsection
