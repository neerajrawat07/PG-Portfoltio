@extends('redbull.layouts.app')

@section('title', 'Red Bull | Gives You Wings')

@section('content')
    @include('redbull.partials.hero')
    @include('redbull.partials.stats')
    @include('redbull.partials.products')
    @include('redbull.partials.athletes')
    @include('redbull.partials.gallery')
    @include('redbull.partials.cta')
@endsection
