@extends('frontend.layouts.app')
@section('body')
    <div class="mt-5 pt-5">
        @include('frontend.home.about')
        @include('frontend.home.porject')


        @include('frontend.home.feature')

        {{-- @include('frontend.home.fact') --}}

        @include('frontend.home.moreservices')


    </div>
@endsection
