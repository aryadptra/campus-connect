{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="index.html">
                                <img class="dark" src="{{ asset('backend/img/logo-dark.png') }}" alt="">
                                <img class="light" src="{{ asset('backend/img/logo-white.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Sign in Campus Connect</h6>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="edit-profile__body">
                                        <div class="form-group mb-25">
                                            <label for="username">Username or Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="name@example.com">
                                        </div>
                                        <div class="form-group mb-15">
                                            <label for="password-field">password</label>
                                            <div class="position-relative">
                                                <input id="password" type="password" required
                                                    autocomplete="current-password" class="form-control" name="password"
                                                    placeholder="Password">
                                                <div
                                                    class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="admin-condition">
                                            <div class="checkbox-theme-default custom-checkbox ">
                                                <input class="checkbox" type="checkbox" id="check-1">
                                                <label for="check-1">
                                                    <span class="checkbox-text">Keep me logged in</span>
                                                </label>
                                            </div>
                                            <a href="forget-password.html">forget password?</a>
                                        </div>
                                        <div
                                            class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                            <button type="submit"
                                                class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                sign in
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- End: .card-body -->
                            </form>
                            <div class="admin-topbar">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="color-primary">
                                        Sign up
                                    </a>
                                </p>
                            </div><!-- End: .admin-topbar  -->
                        </div><!-- End: .card -->
                    </div><!-- End: .edit-profile -->
                </div><!-- End: .col-xl-5 -->
            </div>
        </div>
    </div>

@endsection
