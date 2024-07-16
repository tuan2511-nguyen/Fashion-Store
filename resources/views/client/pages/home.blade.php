@extends('client.layouts.master')

@section('title')   
    HEHEHE
@endsection

@section('main')
    <!-- Start hero -->
    @include('client.components.home.hero')
    <!-- End hero -->
    <!-- Start icon boxes -->
    @include('client.components.home.icon-boxes')
    <!-- End icon boxes -->
    <!-- Start category -->
    @include('client.components.home.category')
    <!-- End category -->
    <!-- Start featured Items -->
    @include('client.components.home.featured-items')
    <!-- End featured Items -->
    <!-- Start collection 1 -->
    @include('client.components.home.collection1')
    <!-- End collection 1 -->
    <!-- Start new item store -->
    @include('client.components.home.new-item-store')
    <!-- End new item store -->
    <!-- Start partners -->
    <div class="cs_height_135 cs_height_lg_75"></div>
    <!-- End partners -->
    <!-- Start testimonial -->
    @include('client.components.home.testimonial')
    <!-- End testimonial -->
    <!-- Start collection 2 -->
    @include('client.components.home.collection2')
    <!-- End collection 2 -->
    <!-- Start top selling store -->
    @include('client.components.home.top-selling-store')
    <!-- End top selling store -->
    <!-- Start instagram -->
    @include('client.components.home.instagram')
    <!-- End instagram -->
@endsection
