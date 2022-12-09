@extends('nova::auth.layout')

@section('content')

    @include('nova::auth.partials.header')

    <form
        class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
    >

        @component('nova::auth.partials.heading')
            {{ __('Welcome Back!') }}
        @endcomponent

        @if ($errors->any())
            <p class="text-center font-semibold text-danger my-3">
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </p>
        @endif

        <p class="m-4">
{{--            You can only login using your Noritz account.--}}
        </p>

            <a class="w-full h- btn btn-default btn-primary hover:bg-primary-dark text-center"
               href="{{ route('nova.login.google') }}">
                Sign in using Google
            </a>

            <a class="mt-8 w-full h- btn btn-default btn-primary hover:bg-primary-dark text-center"
               href="{{ route('nova.login.azure') }}">
                Sign in using Azure
            </a>
    </form>
@endsection
