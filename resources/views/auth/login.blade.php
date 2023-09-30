@extends('base')
@section('main')
<div class="my-[12rem] mx-auto w-[20rem] overflow-hidden bg-[#3c9379] rounded-[15px]">
    <div class="flex w-[50%]">
        <button class="py-3 w-full rounded-br-[15px] bg-[#fb4549] text-white">Login</button>
        <a href="registration"><button class="w-full text-white">Register</a>
    </div>
    <form method="POST" action="{{ route('login.custom') }}"  class="flex flex-col">
        @csrf
        <div class="mt-6 gap-5 flex flex-col mx-auto w-[80%]">
            <div class="">
                <input name="email" id="log-email-input" maxlength="30" placeholder="Email" class="text-[#727577] w-full font-medium px-3 h-[3rem] outline-none">
                <p class="hidden px-3 py-1 -mb-3 text-red-500" id="error-email">Please use a valid email address.</p>
            </div>
            <div>
                <div class="flex relative">
                    <input name="password" id="log-password-input" maxlength="20" type="password" placeholder="Password" class="w-full text-[#727577] font-medium px-3 h-[3rem] outline-none">
                    <img id="log-show-password-button" class="left-[90%] z-10 top-[50%] -translate-y-[50%] h-[20px] absolute" src="{{url('/images/show-password.png')}}">
                    <img id="log-show-password-button-show" class="opacity-0 left-[90%] top-[50%] -translate-y-[50%] h-[20px] absolute" src="{{url('/images/show-password1.png')}}">
                </div>
                <p class="hidden px-3 py-1 -mb-3 text-red-500" id="error-password">Please use a valid password.</p>
            </div>
            @error('auth')
            <p class="px-3 py-1 -my-3 text-red-500" id="error-password">{{ $message }}</p>
            @enderror
        </div>
        <button class="my-4 px-3 py-2 w-[30%] mx-auto text-white bg-[#fb4549] rounded-[15px] transition hover:bg-[#f5676a]">Login</button>
    </form>
</div>
<script src="{{ url('js/auth/login.js') }}"></script>
@endsection
