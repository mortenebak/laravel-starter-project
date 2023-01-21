@extends('layouts.base')

@section('body')
    <x-notification />
    @include('partials.header')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset

    @include('partials.footer')
@endsection
